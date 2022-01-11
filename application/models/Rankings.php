<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rankings extends CI_Model
{
    public function get_employee($id_employee)
    {
        if (isset($_GET['start']) && isset($_GET['end'])) {
            $start = $_GET['start'];
            $end = $_GET['end'];
        } else {
            $start = date('Y-m-d', strtotime("-1 month")); // default
            $end = date('Y-m-d');
        }

        $where = "&& a.date BETWEEN '$start' AND '$end'";

        $start    = (new DateTime($start)); //->modify('first day of this month');
        $end      = (new DateTime($end)); //->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($start, $interval, $end);

        $select = "";
        foreach ($period as $dt) {
            $_day =  $dt->format("Y-m-d");
            $_name = $dt->format("Y_m_d");
            // echo $_name;
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_all AS a WHERE a.date = '$_day' && a.id_employee=$id_employee $where GROUP BY MONTH(a.date),YEAR(a.date),a.id_employee) AS m_$_name, ";
        }
        $_start = $start->format('Y-m-d');
        $_end = $end->format('Y-m-d');
        $select .= "parent.employee_name";
        $this->db->select($select);
        $this->db->from("view_time_sheet_all AS parent");
        $this->db->where("date BETWEEN '$_start' AND '$_end'");
        $this->db->where('id_employee', $id_employee);
        $this->db->group_by("parent.id_employee");
        $query = $this->db->get();
        return $query;
    }
    public function get_all_employee()
    {
        $this->db->where('role >', 1);
        return $this->db->get('view_employees');
    }
    public function process_employee()
    {
        if (isset($_GET['start']) && isset($_GET['end'])) {
            $start = $_GET['start'];
            $end = $_GET['end'];
        } else {
            $start = date('Y-m-d', strtotime("-1 month")); // default
            $end = date('Y-m-d');
        }
        $start    = (new DateTime($start)); //->modify('first day of this month');
        $end      = (new DateTime($end)); //->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($start, $interval, $end);
        $employees = $this->get_all_employee()->result();
        $array_data = [];
        foreach ($employees as $key) {
            $total_overtime = 0;
            $count_hour = $this->get_employee($key->id_employee)->result_array();
            foreach ($count_hour as $count => $ch) {
                foreach ($period as $dt) {
                    $_name = $dt->format("Y_m_d");
                    if ($ch['m_' . $_name] > 0) {
                        $hour = $ch['m_' . $_name];
                        if (($hour - 8) > 0) {
                            $total_overtime += $hour - 8;
                        }
                    }
                }
            }
            array_push($array_data, [
                'id_employee' => $key->id_employee,
                'name' => $key->name,
                'badge' => $key->badge,
                'discipline' => $key->discipline,
                'discipline_name' => $key->discipline_name,
                'total_overtime' => $total_overtime
            ]);
        }
        return $array_data;
    }
    public function get_all_discipline()
    {
        return $this->db->get('disciplines');
    }
    public function get_discipline($id_discipline)
    {
        if (isset($_GET['start']) && isset($_GET['end'])) {
            $start = $_GET['start'];
            $end = $_GET['end'];
        } else {
            $start = date('Y-m-d', strtotime("-1 month")); // default
            $end = date('Y-m-d');
        }

        $where = "&& a.date BETWEEN '$start' AND '$end'";

        $start    = (new DateTime($start)); //->modify('first day of this month');
        $end      = (new DateTime($end)); //->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($start, $interval, $end);

        $select = "";
        foreach ($period as $dt) {
            $_day =  $dt->format("Y-m-d");
            $_name = $dt->format("Y_m_d");
            // echo $_name;
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_all AS a WHERE a.date = '$_day' && a.discipline=$id_discipline $where GROUP BY MONTH(a.date),YEAR(a.date),a.discipline) AS m_$_name, ";
        }
        $_start = $start->format('Y-m-d');
        $_end = $end->format('Y-m-d');
        $select .= "parent.discipline, (SELECT COUNT(*) FROM view_time_sheet_all AS a WHERE a.discipline=$id_discipline) AS count_employees";
        $this->db->select($select);
        $this->db->from("view_time_sheet_all AS parent");
        $this->db->where("date BETWEEN '$_start' AND '$_end'");
        $this->db->where('discipline', $id_discipline);
        $this->db->group_by("parent.discipline");
        $query = $this->db->get();
        return $query;
    }
    public function process_discipline()
    {
        if (isset($_GET['start']) && isset($_GET['end'])) {
            $start = $_GET['start'];
            $end = $_GET['end'];
        } else {
            $start = date('Y-m-d', strtotime("-1 month")); // default
            $end = date('Y-m-d');
        }
        $start    = (new DateTime($start)); //->modify('first day of this month');
        $end      = (new DateTime($end)); //->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($start, $interval, $end);
        $disciplines = $this->get_all_discipline()->result();
        $array_data = [];
        foreach ($disciplines as $key) {
            $total_overtime = 0;
            $count_employees = 0;
            $count_hour = $this->get_discipline($key->id_discipline)->result_array();
            foreach ($count_hour as $count => $ch) {
                foreach ($period as $dt) {
                    $_name = $dt->format("Y_m_d");
                    if ($ch['m_' . $_name] > 0) {
                        $hour = $ch['m_' . $_name];
                        if (($hour - 8) > 0) {
                            $total_overtime += $hour - 8;
                        }
                    }
                }
                $count_employees = $ch['count_employees'];
            }
            array_push($array_data, [
                'discipline' => $key->id_discipline,
                'discipline_name' => $key->discipline,
                'total_overtime' => $total_overtime,
                'total_employees' => $count_employees,
                'average' => ($count_employees > 0)?round((($total_overtime/$count_employees)*100),1):0,
            ]);
        }
        return $array_data;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Totals extends CI_Model
{
    public function get_per_job()
    {
        if (isset($_GET['start']) && isset($_GET['end'])) {
            $start = $_GET['start'];
            $end = $_GET['end'];
        } else {
            $start = date('Y-m-d', strtotime("-1 month")); // default
            $end = date('Y-m-d');
        }

        $where = "&& a.date BETWEEN '$start' AND '$end'";
        if (isset($_GET['job'])) {
            if ($_GET['job'] != "") {
                $id_job = $_GET['job'];
                $where .= " && a.id_job=$id_job";
            } else {
                $id_job = 1;
                $where .= " && a.id_job=$id_job";
            }
        } else {
            $id_job = 1;
            $where .= " && a.id_job =$id_job";
        }

        $start    = (new DateTime($start)); //->modify('first day of this month');
        $end      = (new DateTime($end)); //->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($start, $interval, $end);

        $select = "";
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_all AS a WHERE a.id_employee=parent.id_employee $where GROUP BY a.id_employee) AS totals, ";
        foreach ($period as $dt) {
            $_day =  $dt->format("Y-m-d");
            $_name = $dt->format("Y_m_d");
            // echo $_name;
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_all AS a WHERE a.date = '$_day' && a.id_employee=parent.id_employee $where GROUP BY MONTH(a.date),YEAR(a.date),a.id_employee) AS m_$_name, ";
        }
        $_start = $start->format('Y-m-d');
        $_end = $end->format('Y-m-d');
        $select .= "parent.employee_name, parent.discipline_name, parent.subordinated,badge ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_all AS parent");
        $this->db->where("id_job", $id_job);
        $this->db->where("date BETWEEN '$_start' AND '$_end'");
        $this->db->group_by("parent.id_employee");
        $query = $this->db->get();
        return $query;
    }
    public function get_sub_per_job()
    {
        if (isset($_GET['start']) && isset($_GET['end'])) {
            $start = $_GET['start'];
            $end = $_GET['end'];
        } else {
            $start = date('Y-m-d', strtotime("-1 month")); // default
            $end = date('Y-m-d');
        }

        $where = "&& a.date BETWEEN '$start' AND '$end'";
        $where_total = " a.date BETWEEN '$start' AND '$end'";
        if (isset($_GET['job'])) {
            if ($_GET['job'] != "") {
                $id_job = $_GET['job'];
                $where .= " && a.id_job=$id_job";
                $where_total .= " && a.id_job=$id_job";
            } else {
                $id_job = 1;
                $where .= " && a.id_job=$id_job";
                $where_total .= " && a.id_job=$id_job";
            }
        } else {
            $id_job = 1;
            $where .= " && a.id_job =$id_job";
            $where_total .= " && a.id_job =$id_job";
        }

        $start    = (new DateTime($start)); //->modify('first day of this month');
        $end      = (new DateTime($end)); //->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($start, $interval, $end);

        // echo $where_total;
        $select = "";
        // if ($where_total != "") {
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_all AS a WHERE $where_total) AS totals, ";
        // } else {
        //     $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_all AS a WHERE $where_total_2) AS totals, ";
        // }
        foreach ($period as $dt) {
            $_day =  $dt->format("Y-m-d");
            $_name = $dt->format("Y_m_d");
            // echo $_name;
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_all AS a WHERE a.date = '$_day' $where) AS m_$_name, ";
        }
        $_start = $start->format('Y-m-d');
        $_end = $end->format('Y-m-d');
        $this->db->select($select);
        $this->db->from("view_time_sheet_all AS parent");
        $this->db->where("id_job", $id_job);
        // $this->db->where("date BETWEEN '$_start' AND '$_end'");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
}

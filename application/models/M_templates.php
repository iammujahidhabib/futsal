<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_templates extends CI_Model
{
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }
    public function update($tabel, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($tabel, $data);
    }
    public function delete($tabel, $where)
    {
        $this->db->where($where);
        return $this->db->delete($tabel);
    }
    public function view_where($tabel, $where)
    {
        $this->db->where($where);
        return $this->db->get($tabel);
    }
    public function get_notification($tabel, $where)
    {
        $this->db->order_by('date', "DESC");
        $this->db->where($where);
        return $this->db->get($tabel);
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function get_user_notification($id)
    {
        # get id user buat notif
        return $this->db->query("SELECT * FROM `transaksi` JOIN users USING(id_member) WHERE id_transaksi=" . $id);
    }
    public function view($tabel)
    {
        return $this->db->get($tabel);
    }
    public function join($tabel, $using, $with)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->join($with, $using);
        $query = $this->db->get();
        return $query;
    }
    public function join_where($tabel, $using, $with, $where)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->join($with, $using);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    function view_limit($tabel, $limit, $start)
    {
        $query = $this->db->get($tabel, $limit, $start);
        return $query;
    }
    public function view_limit_where($tabel, $limit, $start, $where)
    {
        $this->db->where($where);
        $query = $this->db->get($tabel, $limit, $start);
        return $query;
    }
    public function total_hour_per_month()
    {
        if (isset($_GET['employee'])) {
            $where = [
                'id_employee' => $_GET['employee'],
                'MONTH(date)' => date('m', strtotime($_GET['date']))
            ];
        } else {
            $where = [
                'id_employee' => $this->session->id,
                'MONTH(date)' => date('m')
            ];
        }
        $this->db->select("SUM(hour) as total");
        $this->db->from("time_sheets");
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function total_day_per_month()
    {
        if (isset($_GET['employee'])) {
            $where = [
                'id_employee' => $_GET['employee'],
                'MONTH(date)' => date('m', strtotime($_GET['date']))
            ];
        } else {
            $where = [
                'id_employee' => $this->session->id,
                'MONTH(date)' => date('m')
            ];
        }
        $this->db->select("COUNT(date) as total");
        $this->db->from("time_sheets");
        $this->db->where($where);
        $this->db->group_by("date");
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function status_approve($id, $date)
    {
        $where = [
            'id_employee' => $id,
            'date' => $date,
            'approve_status'=>1
        ];
        $this->db->select("*");
        $this->db->from("time_sheets");
        $this->db->where($where);
        // $this->db->group_by("date");
        $query = $this->db->get();
        $query = $query->result();
        if (!empty($query)) {
            // if ($query[0]->total > 0) {
                return "Sudah diapprove";
            // } else {
            //     return "Belum diapprove";
            // }
        } else {
            return "Belum diapprove";
        }
    }
    public function monthly_employee()
    {
        if (isset($_GET['employee'])) {
            $id_employee = $_GET['employee'];
            $date = $_GET['date'];
            $where = [
                'id_employee' => $_GET['employee'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_employee = $this->session->id;
            $date = date('Y-m');
            $where = [
                'id_employee' => $id_employee,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $d_count = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $select .= "(SELECT SUM(a.hour) FROM time_sheets AS a WHERE a.id_employee=$id_employee && a.id_job=parent.id_job && a.date LIKE '$date%' GROUP BY a.id_job) AS totals, ";
        for ($i = 1; $i <= $d_count; $i++) {
            $select .= "(SELECT SUM(a.hour) FROM time_sheets AS a WHERE a.id_employee=$id_employee && a.date='$date-$i' && a.id_job=parent.id_job GROUP BY a.date,a.id_job) AS m$i, ";
        }
        $select .= "parent.job_title, parent.job_number, parent.subordinated ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.job_title");
        $this->db->group_by("parent.job_number");
        $this->db->group_by("parent.subordinated");
        $query = $this->db->get();
        return $query;
    }
    public function sub_monthly_employee()
    {
        if (isset($_GET['employee'])) {
            $id_employee = $_GET['employee'];
            $date = $_GET['date'];
            $where = [
                'id_employee' => $_GET['employee'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_employee = $this->session->id;
            $date = date('Y-m');
            $where = [
                'id_employee' => $id_employee,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $d_count = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $d_count; $i++) {
            $select .= "(SELECT SUM(a.hour) FROM time_sheets AS a WHERE a.id_employee=$id_employee && a.date='$date-$i' GROUP BY a.date) AS m$i, ";
        }
        $select .= "(SELECT SUM(a.hour) FROM time_sheets AS a WHERE a.id_employee=$id_employee && a.date LIKE '$date%') AS totals ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs AS parent");
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
    public function chart_monthly_employee()
    {
        if (isset($_GET['employee'])) {
            $id_employee = $_GET['employee'];
            $date = $_GET['date'];
            $where = [
                'id_employee' => $_GET['employee'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_employee = $this->session->id;
            $date = date('Y-m');
            $where = [
                'id_employee' => $id_employee,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }

        $select = "(SELECT SUM(a.hour) FROM time_sheets AS a WHERE a.id_employee=$id_employee && a.id_job=parent.id_job && a.date LIKE '$date%' GROUP BY a.id_job) AS totals, parent.job_number";

        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.job_number");
        $query = $this->db->get()->result();

        $total_all = $this->totals_monthly_employee();
        if(!empty($total_all)){
            $total_all = $total_all[0]->totals;
        }

        $labels = [];
        $distribution = [];
        $percentage = [];
        foreach ($query as $key) {
            array_push($labels, $key->job_number);
            array_push($distribution, $key->totals);
            if(!empty($total_all)){
                array_push($percentage, round(($key->totals / $total_all) * 100));
            }
        }
        return ['labels' => $labels, 'distribution' => $distribution, 'percentage' => $percentage];
    }
    public function totals_monthly_employee()
    {
        if (isset($_GET['employee'])) {
            $id_employee = $_GET['employee'];
            $date = $_GET['date'];
            $where = [
                'id_employee' => $_GET['employee'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_employee = $this->session->id;
            $date = date('Y-m');
            $where = [
                'id_employee' => $id_employee,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $select .= "(SELECT SUM(a.hour) FROM time_sheets AS a WHERE a.id_employee=$id_employee && a.date LIKE '$date%') AS totals, ";
        $select .= "parent.job_number";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs AS parent");
        $this->db->where($where);
        $query = $this->db->get()->result();
        return $query;
    }
    public function monthly_discipline()
    {
        if (isset($_GET['discipline'])) {
            $id_discipline = $_GET['discipline'];
            $date = $_GET['date'];
            $where = [
                'discipline' => $_GET['discipline'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            if ($this->session->role == 1) {
                $id_discipline = 1;
            } else {
                $id_discipline = $this->session->discipline;
            }
            $date = date('Y-m');
            $where = [
                'discipline' => $id_discipline,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $d_count = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $d_count; $i++) {
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_discpiline AS a WHERE a.discipline=$id_discipline && a.date='$date-$i' && a.id_job=parent.id_job GROUP BY a.date,a.id_job) AS m$i, ";
        }
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_discpiline AS a WHERE a.discipline=$id_discipline && a.id_job=parent.id_job && a.date LIKE '$date%') AS totals, ";
        $select .= "parent.job_title, parent.job_number, parent.subordinated ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs_discpiline AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.job_title");
        $this->db->group_by("parent.job_number");
        $this->db->group_by("parent.subordinated");
        $query = $this->db->get();
        return $query;
    }
    public function sub_monthly_discipline()
    {
        if (isset($_GET['discipline'])) {
            $id_discipline = $_GET['discipline'];
            $date = $_GET['date'];
            $where = [
                'discipline' => $_GET['discipline'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            if ($this->session->role == 1) {
                $id_discipline = 1;
            } else {
                $id_discipline = $this->session->discipline;
            }
            $date = date('Y-m');
            $where = [
                'discipline' => $id_discipline,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $d_count = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $d_count; $i++) {
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_discpiline AS a WHERE a.discipline=$id_discipline && a.date='$date-$i') AS m$i, ";
        }
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_discpiline AS a WHERE a.discipline=$id_discipline) AS totals, ";
        $select .= "parent.job_title, parent.job_number, parent.subordinated ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs_discpiline AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.date");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
    public function chart_monthly_discipline()
    {
        if (isset($_GET['discipline'])) {
            $id_discipline = $_GET['discipline'];
            $date = $_GET['date'];
            $where = [
                'discipline' => $_GET['discipline'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            if ($this->session->role == 1) {
                $id_discipline = 1;
            } else {
                $id_discipline = $this->session->discipline;
            }
            $date = date('Y-m');
            $where = [
                'discipline' => $id_discipline,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_discpiline AS a WHERE a.discipline=$id_discipline && a.id_job=parent.id_job && a.date LIKE '$date%') AS totals, ";
        $select .= "parent.job_number";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs_discpiline AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.job_number");
        $query = $this->db->get()->result();
        // echo "<pre>";
        // print_r($query);

        $total_all = $this->totals_monthly_discipline();
        if(!empty($total_all)){
            $total_all = $total_all[0]->totals;
        }
        $labels = [];
        $distribution = [];
        $percentage = [];
        foreach ($query as $key) {
            array_push($labels, $key->job_number);
            array_push($distribution, $key->totals);
            if(!empty($total_all)){
                array_push($percentage, round(($key->totals / $total_all) * 100));
            }
        }
        return ['labels' => $labels, 'distribution' => $distribution, 'percentage' => $percentage];
    }
    public function totals_monthly_discipline()
    {
        if (isset($_GET['discipline'])) {
            $id_discipline = $_GET['discipline'];
            $date = $_GET['date'];
            $where = [
                'discipline' => $_GET['discipline'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            if ($this->session->role == 1) {
                $id_discipline = 1;
            } else {
                $id_discipline = $this->session->discipline;
            }
            $date = date('Y-m');
            $where = [
                'discipline' => $id_discipline,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_discpiline AS a WHERE a.discipline=$id_discipline) AS totals, ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs_discpiline AS parent");
        $this->db->where($where);
        $query = $this->db->get()->result();
        return $query;
    }
    public function monthly_department()
    {
        if (isset($_GET['department'])) {
            $id_department = $_GET['department'];
            $date = $_GET['date'];
            $where = [
                'department' => $_GET['department'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_department = 1;
            $date = date('Y-m');
            $where = [
                'department' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        // echo $id_department;
        $select = "";
        $d_count = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $d_count; $i++) {
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_department AS a WHERE a.department=$id_department && a.date='$date-$i' && a.id_job=parent.id_job GROUP BY a.date,a.id_job) AS m$i, ";
        }
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_department AS a WHERE a.department=$id_department && a.date LIKE '$date%' && a.id_job=parent.id_job) AS totals, ";
        $select .= "parent.job_title, parent.job_number";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs_department AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.job_title");
        $this->db->group_by("parent.job_number");
        $query = $this->db->get();
        return $query;
    }
    public function sub_monthly_department()
    {
        if (isset($_GET['department'])) {
            $id_department = $_GET['department'];
            $date = $_GET['date'];
            $where = [
                'department' => $_GET['department'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_department = 1;
            $date = date('Y-m');
            $where = [
                'department' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        // echo $id_department;
        $select = "";
        $d_count = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $d_count; $i++) {
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_department AS a WHERE a.department=$id_department && a.date='$date-$i' && a.id_job=parent.id_job) AS m$i, ";
        }
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_department AS a WHERE a.department=$id_department && a.date LIKE '$date%') AS totals, ";
        $select .= "parent.job_title, parent.job_number";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs_department AS parent");
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
    public function chart_monthly_department()
    {
        if (isset($_GET['department'])) {
            $id_department = $_GET['department'];
            $date = $_GET['date'];
            $where = [
                'department' => $_GET['department'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_department = 1;
            $date = date('Y-m');
            $where = [
                'department' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        // echo $id_department;
        $select = "";
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_department AS a WHERE a.department=$id_department && a.date LIKE '$date%' && a.id_job=parent.id_job) AS totals, ";
        $select .= "parent.job_title, parent.job_number";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs_department AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.job_number");
        $query = $this->db->get()->result();
        // echo "<pre>";
        // print_r($query);

        $total_all = $this->totals_monthly_department();
        if(!empty($total_all)){
            $total_all = $total_all[0]->totals;
        }
        $labels = [];
        $distribution = [];
        $percentage = [];
        foreach ($query as $key) {
            array_push($labels, $key->job_number);
            array_push($distribution, $key->totals);
            if(!empty($total_all)){
                array_push($percentage, round(($key->totals / $total_all) * 100));
            }
        }
        return ['labels' => $labels, 'distribution' => $distribution, 'percentage' => $percentage];
    }
    public function totals_monthly_department()
    {
        if (isset($_GET['department'])) {
            $id_department = $_GET['department'];
            $date = $_GET['date'];
            $where = [
                'department' => $_GET['department'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_department = 1;
            $date = date('Y-m');
            $where = [
                'department' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        // echo $id_department;
        $select = "";
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_jobs_department AS a WHERE a.department=$id_department && a.date LIKE '$date%') AS totals, ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_jobs_department AS parent");
        $this->db->where($where);
        $query = $this->db->get()->result();
        return $query;
    }
    public function monthly_perjob()
    {
        if (isset($_GET['job'])) {
            $id_job = $_GET['job'];
            $date = $_GET['date'];
            $where = [
                'id_job' => $_GET['job'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_job = 1;
            $date = date('Y-m');
            $where = [
                'id_job' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $d_count = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $d_count; $i++) {
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_employees AS a WHERE a.id_job=$id_job && a.date='$date-$i' && a.id_employee=parent.id_employee) AS m$i, ";
        }
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_employees AS a WHERE a.id_job=$id_job && a.date LIKE '$date%' && a.id_employee=parent.id_employee) AS totals, ";
        $select .= "parent.employee_name, parent.badge, parent.discipline_name,parent.subordinated ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_employees AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.id_employee");
        $query = $this->db->get();
        return $query;
    }
    public function sub_monthly_perjob()
    {
        if (isset($_GET['job'])) {
            $id_job = $_GET['job'];
            $date = $_GET['date'];
            $where = [
                'id_job' => $_GET['job'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_job = 1;
            $date = date('Y-m');
            $where = [
                'id_job' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $d_count = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $d_count; $i++) {
            $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_employees AS a WHERE a.id_job=$id_job && a.date='$date-$i') AS m$i, ";
        }
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_employees AS a WHERE a.id_job=$id_job && a.date LIKE '$date%' && a.id_employee=parent.id_employee) AS totals, ";
        $select .= "parent.employee_name, parent.badge, parent.discipline_name,parent.subordinated ";
        $this->db->select($select);
        $this->db->from("view_time_sheet_employees AS parent");
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
    public function totals_monthly_perjob()
    {
        if (isset($_GET['job'])) {
            $id_job = $_GET['job'];
            $date = $_GET['date'];
            $where = [
                'id_job' => $_GET['job'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_job = 1;
            $date = date('Y-m');
            $where = [
                'id_job' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_employees AS a WHERE a.id_job=$id_job && a.date LIKE '$date%') AS totals, ";
        $select .= "parent.employee_name";
        $this->db->select($select);
        $this->db->from("view_time_sheet_employees AS parent");
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function chart_monthly_perjob()
    {
        if (isset($_GET['job'])) {
            $id_job = $_GET['job'];
            $date = $_GET['date'];
            $where = [
                'id_job' => $_GET['job'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_job = 1;
            $date = date('Y-m');
            $where = [
                'id_employee' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_employees AS a WHERE a.id_job=$id_job && a.date LIKE '$date%' && a.id_employee=parent.id_employee) AS totals, ";
        $select .= "parent.employee_name";
        $this->db->select($select);
        $this->db->from("view_time_sheet_employees AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.id_employee");
        $query = $this->db->get()->result();
        // echo "<pre>";
        // print_r($query);

        $total_all = $this->totals_monthly_department();
        if(!empty($total_all)){
            $total_all = $total_all[0]->totals;
        }
        $labels = [];
        $distribution = [];
        $percentage = [];
        foreach ($query as $key) {
            array_push($labels, $key->employee_name);
            array_push($distribution, $key->totals);
            if(!empty($total_all)){
                array_push($percentage, round(($key->totals / $total_all) * 100));
            }
        }
        return ['labels' => $labels, 'distribution' => $distribution, 'percentage' => $percentage];
    }
    public function chart2_monthly_perjob()
    {
        if (isset($_GET['job'])) {
            $id_job = $_GET['job'];
            $date = $_GET['date'];
            $where = [
                'id_job' => $_GET['job'],
                'MONTH(date)' => date('m', strtotime($_GET['date'])),
                'YEAR(date)' => date('Y', strtotime($_GET['date'])),
            ];
        } else {
            $id_job = 1;
            $date = date('Y-m');
            $where = [
                'id_employee' => 1,
                'MONTH(date)' => date('m'),
                'YEAR(date)' => date('Y'),
            ];
        }
        $select = "";
        $select .= "(SELECT SUM(a.hour) FROM view_time_sheet_employees AS a WHERE a.id_job=$id_job && a.date LIKE '$date%' && a.id_employee=parent.id_employee) AS totals, ";
        $select .= "parent.discipline_name";
        $this->db->select($select);
        $this->db->from("view_time_sheet_employees AS parent");
        $this->db->where($where);
        $this->db->group_by("parent.discipline_name");
        $query = $this->db->get()->result();
        // echo "<pre>";
        // print_r($query);

        $total_all = $this->totals_monthly_department();
        if(!empty($total_all)){
            $total_all = $total_all[0]->totals;
        }
        $labels = [];
        $distribution = [];
        $percentage = [];
        foreach ($query as $key) {
            array_push($labels, $key->discipline_name);
            array_push($distribution, $key->totals);
            if(!empty($total_all)){
                array_push($percentage, round(($key->totals / $total_all) * 100));
            }
        }
        return ['labels' => $labels, 'distribution' => $distribution, 'percentage' => $percentage];
    }
}

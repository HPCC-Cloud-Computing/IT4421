<?php
class SortController extends BaseController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function process() {
        set_time_limit(0);
        //sau khi co INFO thi thuc hien sort
        $info = new Info('file_path');
        $info->get_data();
        
        //B1: tao danh sach cac major de luu cac ticket
        $majors = array();
        foreach ($info->list_majors as $major) {
            $majors[$major] = array();
        }
        
        //B2: gan Tickets cho tung chuyen nganh.
        foreach ($info->list_tickets as $ticket) {
            $majors[$ticket->major][] = $ticket;
        }
        
        //B3: sort tung chuyen nganh
        foreach ($majors as $major) {
            usort($major, array("Ticket", "cmp"));
            
            /*
            echo "<pre>";
            print_r($major);
            echo "</pre>";*/
        }
        
        //B4: xu ly, chon loc.
        $key_order = 1;
        $n = sizeof($majors);
        while (true) {
            $key_add = true;
            
            // chon ra nhung hoc sinh nam trong chi tieu, co nguyen vong <= $i, vi chac chan ho se dau
            for ($i = 0; $i < $n; $i++) {
                if (sizeof($majors[$info->list_majors[$i]]) <= $info->target[$i]) {
                    continue;
                }
                for ($j = 0; $j < $info->target[$i]; $j++) {
                    echo '<script type="text/javascript">alert("Start:  ' . $majors[$info->list_majors[$i]][$j]->order . '");</script>';
    
                    if ($majors[$info->list_majors[$i]][$j]->order <= $key_order) {
                        //echo '<script type="text/javascript">alert("Iim thay");</script>';
                        
                        // chac chan nguoi nay dau vao nganh thu $i
                        // unset nguoi nay o tat ca cac nganh khac
                        for ($k = 0; $k < $n; $k++) {
                            if ($k == $i) {
                                
                                // khong tim trong nganh da tim thay nguyen vong cao nhat
                                continue;
                            } 
                            else {
                                $m = sizeof($majors[$info->list_majors[$k]]);
                                
                                //echo '<script type="text/javascript">alert("Truoc ' . $m . '");</script>';
                                for ($l = 0; $l < $m; $l++) {
                                    try {
                                        if ($majors[$info->list_majors[$k]][$l]->idf_number == $majors[$info->list_majors[$i]][$j]->idf_number) {
                                            unset($majors[$info->list_majors[$k]][$l]);
                                            //echo '<script type="text/javascript">alert("Truoc ' . $majors[$info->list_majors[$k]][$l] . '");</script>';
                                            $majors[$info->list_majors[$k]] = array_values($majors[$info->list_majors[$k]]);
                                        }
                                    }
                                    catch(Exception $e) {
                                        //echo '<script type="text/javascript">alert("Truoc ' . $k." ".$l . '");</script>';
                                    }
                                }
                            }
                        }
                        $key_add = false;
                    }
                }
            }
            if ($key_add) {
                $key_order++;
                if ($key_add > 4) {
                    break;
                }
            }
        }
        echo "<pre>";
        print_r($majors);
        echo "</pre>";
        
        //return View::make('sort');
        return "Dang Van Dai";
    }
}
class Info
{
    public $list_majors = array();
    public $list_tickets = array();
    public $target = array(600, 180, 80, 50, 60, 100, 180, 150, 100, 15);
    public function get_data($file_name = '') {
        
        // read file XML
        $doc = new DOMDocument();
        $doc->load(URL::asset('y-duoc-h.xml'));
        $rows = $doc->getElementsByTagName('Row');
        foreach ($rows as $row) {
            $cells = $row->getElementsByTagName('Cell');
            $i = 0;
            $ticket = new Ticket();
            foreach ($cells as $cell) {
                
                /*if ($i == 2 || $i == 11 || $i == 12 || $i == 13) {
                $data = $cell->getElementsByTagName('Data');
                echo $data->item(0)->nodeValue . '</br>';
                }*/
                if ($i == 2) {
                    $data = $cell->getElementsByTagName('Data');
                    $ticket->idf_number = $data->item(0)->nodeValue;
                }
                if ($i == 11) {
                    $data = $cell->getElementsByTagName('Data');
                    $ticket->score = $data->item(0)->nodeValue;
                }
                if ($i == 12) {
                    $data = $cell->getElementsByTagName('Data');
                    $ticket->order = $data->item(0)->nodeValue;
                }
                if ($i == 13) {
                    $data = $cell->getElementsByTagName('Data');
                    $ticket->major = $data->item(0)->nodeValue;
                }
                $i++;
            }
            $this->list_tickets[] = $ticket;
            if ($this->check_not_exist($ticket->major)) {
                $this->list_majors[] = $ticket->major;
            }
        }
    }
    
    function check_not_exist($major) {
        foreach ($this->list_majors as $value) {
            if ($major == $value) {
                return false;
            }
        }
        return true;
    }
}

/**
 *
 */
class Ticket
{
    public $idf_number;
    public $score;
    public $order;
    public $major;
    
    /**
     * Set idf, score and order ~ nguyen vong so may
     * @param    $idf_number
     * @param    $score
     * @param    $order
     */
    public function set_number($idf_number) {
        $this->idf_number = $idf_number;
    }
    
    public function set_score($score = 0) {
        $this->score = $score;
    }
    
    public function set_order($order = 1) {
        $this->order = $order;
    }
    
    public function set_major($major = '') {
        $this->major = $major;
    }
    
    static function cmp($a, $b) {
        if ($a->score == $b->score) {
            return 0;
        }
        return ($a->score < $b->score) ? 1 : -1;
    }
}

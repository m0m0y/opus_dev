<?php

class AdmissionCounselling extends db_conn_mysql {

    public function getContent() {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM admission_counselling");
        $query->execute();
        $row = $query->fetchAll();
        
        foreach($row as $k=>$v) {
            echo'
                <div class="card shadow mb-4">
                    <div class="card-header py-3">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h5 class="m-0 font-weight-bold text-primary">
                                '.$v["section"].' <span class="badge bg-secondary" style="color: white;">Last update: '.$v['date_update'].'</span>
                                '.($v['status'] == 0 ? "" : '<span class="badge bg-warning" style="color: black;">Disabled</span>').'
                            </h5>

                            <a href="admission_counselling.php?update='.$v['admission_id'].'" class="btn btn-sm btn-info"><i class="fas fa-pen"></i> Update</a>
                        </div>
                        
                    </div>

                    <div class="card-body">

                        <div class="container-fluid">
                            <h5 class="skeleton title_load mb-3">'.$v["title"].'</h5>
                            <div class="skeleton content_load">'.$v["content"].'</div>
                        </div>

                    </div>
                </div>
            ';
        }
    }

    public function getContentWhere($admission_id) {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM admission_counselling WHERE admission_id='$admission_id'");
        $query->execute();
        $row = $query->fetchAll();

        foreach($row as $k=>$v) {
            echo  '
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-sm fa-edit"></i> '.$v['section'].'
                                <span class="badge rounded-pill bg-secondary" style="color: white;"></span>
                            </h6>

                            <div class="d-sm-flex align-items-center justify-content-between">
                                <button id="btn-save" class="btn btn-sm btn-primary m-1"><i class="fas fa-save"></i> Save</button>
                                <a href="admission_counselling.php" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="d-none">
                            <input type="hidden" name="admission_id" id="admission_id" value="'.$v['admission_id'].'" class="form-control" readonly>
                        </div>

                        <div class="row mb-4">
                            <label for="info_title" class="col-sm-2 col-form-label text-right"><span class="required">*</span> Title:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" value="'.$v['title'].'" placeholder="Type Here...">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content:'.'</label>
                            <div class="col-sm-9">
                                <textarea name="page_content" id="page_content" class="form-control" required>'.$v['content'].'</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label text-right">Status:</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="status" name="status">
                                    <option '.($v['status'] == 0 ? "selected" : "").' value="0">Enabled</option>
                                    <option  '.($v['status'] == 1 ? "selected" : "").' value="1">Disabled</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            ';
        }
    }

    public function updateContent($id, $title, $content, $status, $card_id, $card_title, $card_content) {
        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE admission_counselling SET title='$title', content='$content', status='$status' WHERE admission_id='$id'");
        $query->execute();
    }
}   
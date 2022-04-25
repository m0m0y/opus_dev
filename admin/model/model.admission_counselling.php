<?php

class AdmissionCounselling extends db_conn_mysql {

    public function getContent() {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM admission_counselling");
        $query->execute();
        
        foreach($query->fetchAll() as $k=>$v) {
            echo
                '<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        
                        <h6 class="m-0 font-weight-bold text-primary">
                            '.$v["section"].'
                            <span class="badge rounded-pill bg-secondary" style="color: white;"></span>
                        </h6>

                        <button onclick="update(\''.$v['admission_id'].'\',\''.$v['section'].'\',\''.$v['title'].'\',\''.$v['content'].'\',\''.$v['status'].'\')" class="btn btn-primary">Update</button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <h5 class="skeleton title_load">'.$v["title"].'</h5>

                        <p class="skeleton content_load">'.$v["content"].'</p>
                    </div>
                </div>
                </div>';
          }

        // return $result[$column];
    }

}   
<?php
    if(isset($_GET['alert'])){
        switch($_GET['alert']){
            case 'InsertSuccess':
                echo "
                    <div class='alert alert-success'>
                        <button type='button' class='close' data-dismiss='alert'>
                            <i class='ace-icon glyphicon glyphicon-times'></i>
                        </button>
                        <strong>
                            <i class='ace-icon glyphicon glyphicon-ok'></i> Success! 
                        </strong>
                        Data berhasil di simpan

                    </div>
                ";

            break;
            case 'DeleteSuccess':
                echo "
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>
                    <strong>
                        <i class='ace-icon fa fa-eraser'></i> Success! 
                    </strong>
                    Data berhasil di hapus

                </div>
                ";
            break;
            case 'EditSuccess':
                echo "
                <div class='alert alert-warning'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>
                    <strong>
                        <i class='ace-icon fa fa-edit'></i> Success! 
                    </strong>
                    Data berhasil di edit

                </div>
                ";
            break;

            default:
            break;
        }
    }

?>
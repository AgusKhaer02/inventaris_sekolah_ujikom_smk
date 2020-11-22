<?php
    if(isset($_GET['alert'])){
        switch($_GET['alert']){
            case 'PinjamBerhasil':
                echo "
                    <div class='alert alert-success'>
                        <button type='button' class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                        </button>
                        <strong>
                            <i class='ace-icon glyphicon glyphicon-ok'></i> Success! 
                        </strong>
                        Permintaan peminjaman barang berhasil, mohon hubungi admin untuk verifikasi peminjaman anda

                    </div>
                ";

            break;
            case 'SBatalPinjam':
                echo "
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                    </button>
                    <strong>
                        <i class='ace-icon fa fa-times'></i> Success! 
                    </strong>
                    Peminjaman telah dibatalkan

                </div>
                ";
            break;

            default:
            break;
        }
    }

?>
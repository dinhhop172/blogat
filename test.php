<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            p{
                margin-bottom: 0 !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 bg-info border-right d-flex justify-content-center align-items-center">
                    <p>Margin</p>
                </div>
                <div class="col-md-10">
                    <div class="row border-bottom">
                        <div class="col-md-6 bg-info border-right d-flex justify-content-center align-items-center">
                            <p>Gallery</p>
                        </div>
                        <div class="col-md-6 bg-info">
                            <div class="row">
                                <div class="col-md-12 border-bottom d-flex justify-content-center align-items-center">
                                    <p>Title</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center align-items-center" style="height: 150px;">
                                    <p>Buy box</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 bg-info border-bottom d-flex justify-content-center align-items-center">
                            <p>Description</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 bg-info d-flex justify-content-center align-items-center">
                            <p>Related</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 bg-info border-left d-flex justify-content-center align-items-center">
                    <p>Margin</p>
                </div>
            </div>
        </div>

        <form id="addpost-form" action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
               
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" name="image" class="form-control" placeholder="">
                </div>
            </div>
            <input type="submit" value="sub" name="" id="">
        </form>

        <p>Link 1</p>
        <a data-toggle="modal" data-id="ISBN564541" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>

        <p>&nbsp;</p>


        <p>Link 2</p>
        <a data-toggle="modal" data-id="ISBN-001122" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>

        <div class="modal hide" id="addBookDialog">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">×</button>
            <h3>Modal header</h3>
        </div>
            <div class="modal-body">
                <p>some content</p>
                <input type="text" name="bookId" id="bookId" value=""/>
            </div>
        </div>

        <?php var_dump($_FILES) ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script>
                $(document).on("click", ".open-AddBookDialog", function () {
                    var myBookId = $(this).data('id');
                    $(".modal-body #bookId").val( myBookId );
                    // As pointed out in comments, 
                    // it is unnecessary to have to manually call the modal.
                    // $('#addBookDialog').modal('show');
                });
            </script>
    </body>
</html>

<?php 
class Ban {
    public $mau_sac;
    public $so_chan;
    public function __construct($mau_sac = 'Trắng', $so_chan = 4){
        $this->mau_sac = $mau_sac;
        $this->so_chan = $so_chan;
    }
    public function intro(){
        echo "Đây là chiếc bàn màu {$this->mau_sac} và có {$this->so_chan} chân";
    }
    public function re_intro(){
        echo 'Hello';
        // self::intro();
        $this->intro();
    }
}
class Ban_2 extends Ban{
    public $chat_lieu;
    public function __construct($mau_sac = 'Trắng', $so_chan = 4,$chat_lieu = 'Gỗ'){
        $this->mau_sac = $mau_sac;
        $this->so_chan = $so_chan;
        $this->chat_lieu = $chat_lieu;
    }
    public function intro(){
        echo "Đây là chiếc bàn màu {$this->mau_sac} và có {$this->so_chan} chân, làm bằng {$this->chat_lieu}";
    }
}
$ban_2 = new Ban_2('Nâu',4,'Gỗ');
$ban_2->re_intro();

class Ban_6 {
    public static $mes = 'Lời nhắn';
    public function mes(){
        // echo self::$mes;
        echo static::$mes;
    }
}
$b6 = new Ban_6();
$b6->mes();

class Ban_7 extends Ban_6 {
    public static $mes = 'Tin nhắn';
}
$b7  = new Ban_7();
$b7->mes();

$input = "<blink><strong>Hello!</strong></blink>";
$a = strip_tags($input);
$b = strip_tags($input, "<strong><em>");
echo $b;
?>
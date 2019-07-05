<!-- dikerjakan oleh Alfian Noor 1700018233 -->
 <!DOCTYPE html>
 <html>
 <body>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="js/validation.js"></script>
<link rel="stylesheet" href="css/style.css">
 <form name="form1" action="http://www.saidalfaruq.net/project/z/kirim_email.php" method="post">
<!-- <form action="mail.php" method="post" id="emailForm" enctype="multipart/form-data">
 -->

    <div class="form-group">                  
      <label class="control-label col-sm-2" for="fname">Penerima*:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" name="penerima" placeholder="Enter email" >
      </div>
    </div>              
    <div class="form-group">
      <label class="control-label col-sm-2" for="uname">Subjek*:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="subyek" placeholder="Enter name" >
      </div>
    </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="lname">Attach File:</label>
    <div class="col-sm-10">          
    <input type="file" class="form-control" id="attachFile" name="attachFile">
    </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="comment">Message*:</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" name="pesan" ></textarea>
      </div>
    </div>

  <!-- data yang ditambah -->
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="sendEmail">Send Email</button>
        <button type="reset" class="btn btn-default" name="reset">Reset</button>

     </div>
    </div>
    </div>
</form>
</body>
 </html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .div_deg
        {
            margin-top: 15px;
        }

        .div_p
        {
         display: flex;
         align-items: center;
         margin-top: 60px;
         justify-content: center;
        }

       input{
            width: 400px;
            height: 50px;

        }

        textarea{
            width: 400px;
            height: 300px;
        }

        label{
            width: 220px;
        }
    </style>
</head>
<body>
   <div class="div_p">
    <form action="{{url('send-mail')}}" method="post">
        @csrf
        <div class="div_deg">
        <label>enter receiver email address</label>
        <input type="text" name="email">
        </div>

        <div class="div_deg">
        <label>enter email subject</label>
        <input type="text" name="subject">
       </div>

        <div class="div_deg">
        <label >enter the message</label>
        <textarea name="message"></textarea>
        </div>

        <div class="div_deg">
            <input type="submit" value="send mail">

        </div>


      </div>

    </form>
   </div>
</body>
</html>
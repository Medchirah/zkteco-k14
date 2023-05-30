<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>report</title>
</head>
<style>
    *{
        background-color:#1d2333
    }
    body{
        padding: 80px;
        padding-left: 130px
       
    }
    .titre{
        color: white;
        
    }
    .information{
        color: white;

    }
    .btn{
        background-color: darkorange
    }
    .table{
        margin-top: 30px;
        border-radius: 20px;
        height: 300px
    
    }
    .input{
        background-color: #313339;
        height: 40px;
        border-color: aliceblue;
        border-radius: 10px

    }
    
</style>
<body>
    
    <form action="" method="get" class="form">
        <input type="text" name="query" value="" placeholder="customize your report" class="input">
        <input type="text" name="condition" value="" placeholder="enter condition" class="input">
        <button type="submit">search</button class="btn">
    </form>
    <table border="1"  class="table">
      <tr>
        <th class="titre">nom employe</th >
        <th class="titre">nom departement</th>
        <th class="titre">gender</th>
        <th class="titre">date debut de thavaille</th>
        <th class="titre">device</th>
        <th class="titre">shifttime</th>
        <th class="titre">check-In</th>
        <th class="titre">check-out</th>
        <th class="titre">duration</th>
        <th class="titre">date jour</th>
        <th class="titre">temps de retard</th>

    </tr>  
 
    @foreach ($employes as $employe)
    <tr>
        <td class="information">{{$employe->nom}}</td>
        <td class="information">{{$employe->nomDept}}</td>
        <td class="information">{{$employe->gender}}</td>
        <td class="information">{{$employe->date_travail}}</td>
        <td class="information">{{$employe->nomDevice}}</td>
        <td class="information">{{$employe->name}}</td>
        <td class="information">{{$employe->time_in}}</td>
        <td class="information">{{$employe->time_out}}</td>
        <td class="information">{{$employe->durration}}</td>
        <td class="information">{{$employe->created_at}}</td>
        <td class="information"> {{ $employe->durration}}</td>
        
        
    </tr>  
    @endforeach 
    
         
        
   
        
    </table>
    
</body>
</html>
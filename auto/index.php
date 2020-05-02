
<html>  
    <head>  
        <title>Lab10</title>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>  
    <body>  
         <div class="container">  
            <br />  
            <br />
             <h1 align="center"> Second-Hand Cars</h1>
            <br />
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Search</span>
                    <input type="text" name="search_text" id="search_text" placeholder="Search your dream car" class="form-control" />
                </div>
            </div>
            <br />
            <div id="result"></div>
            <div class="table-responsive">  

                <span id="result"></span>
                <div id="live_data"></div>                 
            </div>  

        </div>

    </body>  
</html>  
<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var Model = $('#Model').text();  
        var Engine = $('#Engine').text(); 
        var Power = $('#Power').text();
        var Fuel = $('#Fuel').text(); 
        var Price = $('#Price').text();
        var Color = $('#Color').text();
        var Age = $('#Age').text();
        var History = $('#History').text();

        if(Model == '')  
        {  
            alert("Enter Model");  
            return false;  
        }  
         
        $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:{Model:Model, Engine:Engine, Power:Power,Fuel:Fuel,Price:Price,Color:Color,Age:Age,History:History},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(Model,text, column_name)  
    {  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{Model:Model, text:text,column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.Engine', function(){  
        var Model = $(this).data("id1");  
        var Engine = $(this).text();  
        edit_data(Model, Engine, "Engine");  
    });  

    $(document).on('blur', '.Power', function(){  
        var Model = $(this).data("id2");  
        var Power = $(this).text();  
        edit_data(Model,Power, "Power");  
    });  

      $(document).on('blur', '.Fuel', function(){  
        var Model = $(this).data("id3");  
        var Fuel = $(this).text();  
        edit_data(Model,Fuel, "Fuel");  
    });

      $(document).on('blur', '.Price', function(){  
        var Model = $(this).data("id4");  
        var Price = $(this).text();  
        edit_data(Model,Price, "Price");  
    }); 

      $(document).on('blur', '.Color', function(){  
        var Model = $(this).data("id5");  
        var Color = $(this).text();  
        edit_data(Model,Color, "Color");  
    }); 

      $(document).on('blur', '.Age', function(){  
        var Model = $(this).data("id6");  
        var Age = $(this).text();  
        edit_data(Model,Age, "Age");  
    }); 

      $(document).on('blur', '.History', function(){  
        var Model = $(this).data("id7");  
        var History = $(this).text();  
        edit_data(Model,History, "History");  
    });  


    $(document).on('click', '.btn_delete', function(){  
        var Model=$(this).data("id8");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{Model:Model},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  


$(document).ready(function(){
    
    load_data();
    function load_data(query)
    {
        $.ajax({
            url:"search.php",
            method:"post",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
        });
    }
    
    $('#search_text').keyup(function(){
        var search = $(this).val();
    
    
        if(search != '')
        {
            load_data(search);
            
        
        }
        else
        {
            load_data();
           

        }

    });


});


</script>
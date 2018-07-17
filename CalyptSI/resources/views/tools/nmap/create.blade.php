@extends('layouts.nav')

@section('title')
<title>CalyptSI - Nmap</title>
@endsection

@section('content')

<body id="myApp">

<h1>Scan</h1>
Target: <input type="text" id="target"/><br>
Arguments: <input type="text" id="arguments"/><br>
Proxy : 
<select name="audit" id="audit"> 
@foreach($audits as $audit)
    <option value="{{ $audit->id }}">{{ $audit->name }}</option>
@endforeach
</select><br>
<br>
<button id="scan">Scan</button><br>
<br>
<div id="table"></div>

<div id="register">
</div>
<br>
<br>
</body>

@endsection


@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script> 
 
var datajson;
    
function scantable(value,index){
    var tablehead = "<tr>";
    var tablebody = "<tr>";
    var TCPtable = "";
    $.each(value, function(index1, value1){
        if(value1 !== null && typeof value1 === 'object')
        {
            TCPtable += scantable(value1,index1);
        }
        else
        {
            if(isNaN(index1))
            {
                tablehead += "<th>" + index1 + "</th>";
                console.log(index);
            }
            else
            {
                tablehead += "<th>" + index + "</th>";
            }
            tablebody += "<td>" + value1 + "</td>";
        }
    });
    tablehead += "</tr>";
    tablebody += "</tr>";
    TCPtable += "<table class=\"table\">" + tablehead + tablebody + "</table>"; 
    return TCPtable;
}
    
function json_loop(value,result){
    var res = "";
    var TCPtable = "";
    var tablehead = "";
    var tablebody = "";
    $.each(value, function(index2, value2) {
        result += index2;
        if(value2 !== null && typeof value2 === 'object'){   
             result += json_loop(value2,res);
        } 

        
        if(index2 === "scan")
        {
            $.each(value2, function(index3, value3){
                $.each(value3, function(index4, value4){
                    if(index4 === "tcp")
                    {
                        var tablehead = "";
                        var tablebody = "";
                        $.each(value4, function(index5, value5){
                            tablehead = "<tr><th>Numéro de Port</th>";
                            tablebody += "<tr>";
                            tablebody += "<td>" + index5 + "</td>";
                            $.each(value5, function(index6, value6){
                            tablehead += "<th>" + index6 + "</th>" ;
                            tablebody += "<td>" + value6 + "</td>";
                            });
                            tablehead += "</tr>";
                            tablebody += "</tr>";
                        });
                        TCPtable += "<table class=\"table\">" + tablehead + tablebody + "</table>";
                    } else {
                        TCPtable += scantable(value4,index4);          
                    }
                });
            });
            document.getElementById('table').innerHTML = TCPtable;
        } 
        
    });
    
    /*
    if (tablehead.length > 0)
    {
    thead += "<tr>";
    tbody += "<tr>";
    tablehead.forEach(function(item, index, array) {
        thead += "<th>" + item + "</th>";
    });
    tablebody.forEach(function(item, index, array) {
        tbody += "<td>" + item + "</td>";
    });
    thead += "</tr>";
    tbody += "</tr>";
    TCPtable += "<table style=\"width:100%\">" + thead + tbody + "</table>";
    document.getElementById('table').innerHTML = document.getElementById('table').innerHTML + TCPtable;
    }
    */
        
    return result;
}
    
$("#scan").click(function() /*envoie une requête POST a l'API qui renvoie un JSON des résultats du scan nmap*/
       {
       var target = $("#target").val();
       var arguments = $("#arguments").val();
        
       if(arguments == null){
         arguments = " ";
       }
    
       var payload = { action:"nmap", hosts:target, arguments:arguments, token: "34095ut0935ug9q8t9q8tfidfjoisdf"}
       
       $.ajax({ /* Requète Ajax vers l'api nmap*/
            type: 'POST',
            url: 'https://' + window.location.hostname + ':8800/api',
            data: JSON.stringify(payload),
            crossDomain: true,
            datatype: 'json',
            success: function(data) {
              var json = JSON.stringify(data);
              var result = "";
              datajson = data;
              result += json_loop(data,result);
              document.getElementById('register').innerHTML = 
                "<select name=\"audit\">" +
                    "@foreach($audits as $audit)" +
                        "<option value=\"{{ $audit->id }}\">{{ $audit->name }}</option>" +
                    "@endforeach" +
                "</select>" +
                "<br>" + 
                "<br>" + 
                "<button id=\"register\">enregistrer</button>" + 
                "<br>" ;
            },
            error: function(jqXHR, status, err){
            alert('érreur, le scan n\'a pas fonctionné'); }
        });
    });
</script>

@endsection
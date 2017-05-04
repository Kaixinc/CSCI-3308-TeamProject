function addRow() {
         
    var myName = document.getElementById("name");
    var price = document.getElementById("price");
    var category = document.getElementById("category");
    var description = document.getElementById("description");
    var web_link = document.getElementById("web_link");
    var table = document.getElementById("myTableData");

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    row.insertCell(0).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
    row.insertCell(1).innerHTML= myName.value;
    row.insertCell(2).innerHTML= price.value;
    row.insertCell(3).innerHTML= category.value;
    row.insertCell(4).innerHTML = description.value;
    row.insertCell(5).innerHTML = web_link.value;
    

}

function deleteRow(obj) {
     
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTableData");
    table.deleteRow(index);
   
}

function addTable() {
     
    var myTableDiv = document.getElementById("myDynamicTable");
     
    var table = document.createElement('TABLE');
    table.border='1';
   
    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);
     
    for (var i=0; i<3; i++){
       var tr = document.createElement('TR');
       tableBody.appendChild(tr);
      
       for (var j=0; j<4; j++){
           var td = document.createElement('TD');
           td.width='75';
           td.appendChild(document.createTextNode("Cell " + i + "," + j));
           tr.appendChild(td);

           for (var k=0; k <5; k++){
            var tb = document.createElement('TB');
            tb.width = '75';
            tb.appendChild(document.createTextNode("Cell" + i + "," + j + "," + k));
            td.appendChild(tb);

            for (var l=0; l < 6; l++){
              var ti = document.createElement('TJ');
              tj.width = '75';
              tj.appendChild(document.createTextNode("Cell" + i + "," + j + "," + k + "," + l));
              tb.appendChild(tj);

              for (var m = 0; m < 7; m++){
                var tk = document.createElement('TK');
                tk.width = '75';
                tk.appendChild(document.createTextNode("Cell" + i + "," + j + "," + k + "," + l + "," + m));
                tj.appendChild(tk);
              }
            }

           }
       }
    }
    myTableDiv.appendChild(table);
   
}

function load() {
   
    console.log("Page load finished");

}

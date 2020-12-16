@extends('admin.layout.master')
@section('title', 'Map Admin')
@section('headname','Dashboard')
@section('content')
<style type="text/css">
  .dt-buttons.btn-group {
    display: none;
}
</style>
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Import From Excel</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-md-3">
                              <label class="text-dark">Upload File (in Excel)</label>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="hidden" value="id" name="">
                                    <input type="file" id="file" class="form-control excel_upload_file" placeholder="File Excel">
                                    <span class="upload_message"></span>
                                    <span class="text-primary" id="status"></span>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                             
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                   <button type="button" value="save" class="btn btn-lg btn-primary upload">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
    jQuery(document).on("click",".upload",function(){
  
  let file = jQuery('.excel_upload_file')[0].files[0];
  
        if (typeof file=='undefined') {
          jQuery(".upload_message").text('Please Select Excel File...!');
          return false;
        }
        else{
          jQuery(".upload_message").text('');

        }
         
var reader = new FileReader();

reader.onload = function(e) {
var data = e.target.result;
var workbook = XLSX.read(data, {
  type: 'binary' 
});
console.log(file);

workbook.SheetNames.forEach(function(sheetName) {
  // Here is your object
  var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
  var json_object = JSON.stringify(XL_row_object);
          var total   =XL_row_object.length;
  send_data(XL_row_object,0,total);
})

};

reader.onerror = function(ex) {
console.log(ex);
};

reader.readAsBinaryString(file);
function send_data1(rows,index,total){
send_data(rows,index,total);
}
function send_data(rows,index,total)
{
let  send_rows = [];
  for(i = index; i <= index+2; i++){
      send_rows.push(rows[i]);
  }
jQuery.ajax({
  url:"{{route('admin.import-excel-process')}}",
  type:"post",
  datatype:"json",
   data: {
          
           rows:send_rows,
           "_token":"{{csrf_token()}}",
           
       },
        error: function(err){
          console.log(err);
         
      },
      success:function(result){
          console.log(result);
          result=result.replace("0", "");
          //console.log(result);
          result = JSON.parse(result);
          console.log(result);
          //console.log(index);

          index += 2;
          if(result.status && result.links.length>0){
              if(rows.length > index){
                   total=total-1;
                  var per=index/total* 100;
                      per=parseInt(per);  
                   jQuery('#status').html(per+"% File Uploaded");

                  send_data1(rows, (index+1),total);
                  //console.log(result.message);
                  //console.log("if");
              }
              else{
                 //setAlertMessages(result.message, result.status);
                 jQuery('#status').html("100% Completed");
                 //console.log("else");
              }
          }
          else{
             jQuery('#status').html("some thing wrong in excel file");
          }
      }

})
}


})

</script>
@endsection

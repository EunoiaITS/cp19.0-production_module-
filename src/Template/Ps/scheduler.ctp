<!--=========
Create serial number form page
==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Planner Daily Operation Scheduler</b></div>

                <div class="clearfix"></div>
                <!--============== Add drawing table area ===================-->
                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="google-calander-admin">
                            <div id="datetimepicker12"></div>
                        </div>
                    </div>
                    <div class="col-sm-offset-8 col-sm-4 col-xs-12">
                        <div class="prepareted-by-csn">
                            <a href="<?php echo $this->Url->build(['controller'=>'ps','action'=>'dailyReport'])?>?date=<?php echo date("d-m-Y");?>" class="button btn btn-info" id="submit">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $( document ).ready(function() {
                $('#submit').on('click', function(){
                    var date = $("#datetimepicker12").data("datepicker").getDate(),
                        formatted = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                    //alert(formatted);
                    var url = "<?php echo $this->Url->build(['controller'=>'ps','action'=>'dailyReport'])?>";
                    //alert(url);
                    $(this).attr("href",url+"?date="+formatted);

                });
            });

        </script>
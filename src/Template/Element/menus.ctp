<!--==================
     sidebar area
     ====================-->

<div id="sidebar">
    <ul>
        <li><a href="login.html" class="active">Home (Login)</a></li>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                SERIAL NUMBER &nbsp;
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'add']); ?>">Create Serial Number</a></li>
                <li class="color-hsh"><a href="csn-verification.html">Verification</a></li>
                <li class="color-hsh"><a href="csn-approval-1st.html">1st Approval</a></li>
                <li class="color-hsh3"><a href="csn-approval-status.html">Approval Status</a></li>
                <li class="color-hsh2"><a href="csn-report.html">CSN Report</a></li>
                <li class="color-hsh2"><a href="csn-mounthly-report.html">CSN Mounthy Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                PRODUCTION PLANNER &nbsp;
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="ps-scheduler-main.html">Production Scheduler</a></li>
                <li class="color-hsh"><a href="ps-scheduler.html">Planner Daily Operation Scheduler</a></li>
                <li class="color-hsh"><a href="ps-scheduler-report.html">Planner Daily Report</a></li>
                <li class="color-hsh3"><a href="ps-monthly-form.html">Production Monthly Schedule Form(Creation)</a></li>
                <li class="color-hsh3"><a href="ps-verification.html">Verification</a></li>
                <li class="color-hsh3"><a href="ps-approval-1.html">Approval 1 </a></li>
                <li class="color-hsh3"><a href="ps-approval-2.html">Approval 2 </a></li>
                <li class="color-hsh"><a href="ps-approval-status.html">Approval Status</a></li>
                <li class="color-hsh2"><a href="ps-report.html">PS Report</a></li>
                <li class="color-hsh2"><a href="ps-progess-report.html">PS Progress Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                MATERIAL ISSUE TICKET (MIT)
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="mit-form.html">MIT create</a></li>
                <li class="color-hsh"><a href="mit-verify-form.html">MIT Ticket Form</a></li>
                <li class="color-hsh"><a href="mit-verify-1.html">MIT Ticket Form Verification</a></li>
                <li class="color-hsh"><a href="mit-verify-2.html">MIT Ticket Form Verification 2</a></li>
                <li class="color-hsh2"><a href="mit-ack.html">MIT Acknowlegement</a></li>
                <li class="color-hsh2"><a href="mit-ack-verify.html">MIT Acknowlegement Form</a></li>
                <li class="color-hsh2"><a href="mit-approval.html">MIT Approval Status</a></li>
                <li class="color-hsh2"><a href="mit-reporting.html">MIT Reporting</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                WORK IN PROGRESS<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="wip-create.html">WIP Create</a></li>
                <li class="color-hsh"><a href="wip-list.html">WIP List</a></li>
                <li class="color-hsh"><a href="wip-form-extra.html">WIP Acknowladge</a></li>
                <li class="color-hsh"><a href="wip-report.html">WIP Report</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-1.html">WIP Section Report Welding</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-2.html">Main Line Tank</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-3.html">Drive Mechanism</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-4.html">Vacuum Chamber</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-5.html">Welding</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-6.html">BTA</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-7.html">Metal Clad</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-8.html">Wiring</a></li>
                <li class="color-hsh2"><a href="wip-sec-report-9.html">Testing</a></li>

                <li class="color-hsh3"><a href="wip-st-report.html">WIP Statistic Report</a></li>
                <li class="color-hsh3"><a href="wip-sp-report-1.html">WIP Staff Progress Report-monthly 1</a></li>
                <li class="color-hsh3"><a href="wip-sp-report-2.html">WIP Staff Progress Report-monthly 2</a></li>
            </ul>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                MATERIAL REQUEST<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="mr-form.html">Create Material Request</a></li>
                <li class="color-hsh"><a href="mr-verify-1.html">Material Request Verification</a></li>
                <li class="color-hsh"><a href="mr-verify-2.html">Material Request Approval Status</a></li>
                <li class="color-hsh2"><a href="mr-approval.html">Approval Status</a></li>
                <li class="color-hsh2"><a href="mr-reporting.html">Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                PRODUCTION REJECTION NOTE FORM<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="prn-form.html">PRN Create</a></li>
                <li class="color-hsh"><a href="prn-approve.html">Verification</a></li>
                <li class="color-hsh"><a href="prn-qa-approve.html">approval 1</a></li>
                <li class="color-hsh"><a href="prn-qa-manager-approve.html">approval 2</a></li>
                <li class="color-hsh"><a href="prn-qa-correction.html">approval 3</a></li>
                <li class="color-hsh"><a href="prn-qa-correction-approve.html">approval 4</a></li>
                <li class="color-hsh2"><a href="prn-approval-status.html">Approval Status</a></li>
                <li class="color-hsh2"><a href="prn-reporting.html">Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                STORE CREDIT NOTE (SCN)<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'scn','action'=>'add']);?>">SCN Create</a></li>
                <li class="color-hsh"><a href="scr-verify.html">SCN verify</a></li>
                <li class="color-hsh"><a href="scr-approve.html">SCN Approve</a></li>
                <li class="color-hsh2"><a href="scr-approval-st.html">Approval Status</a></li>
                <li class="color-hsh2"><a href="scr-reporting.html">Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                FINISH GOODS TRANSFER Note(FGTT)<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="fgtt-form.html">FGTT Create</a></li>
                <li class="color-hsh"><a href="fgtt-verify-1.html">FGTT Verification</a></li>
                <li class="color-hsh"><a href="fgtt-verify-2.html">FGTT Approval</a></li>
                <li class="color-hsh2"><a href="fgtt-form-view.html">Approval Status</a></li>
                <li class="color-hsh2"><a href="fgtt-reporting.html">Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                NON BILLING DELIVERY ORDER<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="nbdo-form.html">NBDO Create</a></li>
                <li class="color-hsh"><a href="nbdo-verify-1.html">NBDO Verification</a></li>
                <li class="color-hsh"><a href="nbdo-verify-2.html">NBDO Approval</a></li>
                <li class="color-hsh2"><a href="nbdo-print-form.html">Approval Status</a></li>
                <li class="color-hsh2"><a href="nbdo-reporting.html">Report</a></li>
            </ul>
        </div>
    </ul>
</div>
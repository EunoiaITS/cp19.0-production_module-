<!--==================
     sidebar area
     ====================-->

<div id="sidebar">
    <ul>
        <li><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'dashboard']); ?>" class="active">Home (Dashboard)</a></li>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                SERIAL NUMBER &nbsp;
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'add']); ?>">Create Serial Number</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'index']); ?>">Requests</a></li>
                <li class="color-hsh3"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'statusReport']); ?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'report']); ?>">CSN Report</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'monthlyReport']); ?>">CSN Mounthy Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                PRODUCTION PLANNER &nbsp;
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'main']); ?>">Production Scheduler</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'scheduler']); ?>">Planner Daily Operation Scheduler</a></li>
                <li class="color-hsh3"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'monthlyScheduler']); ?>">Production Monthly Schedule Form(Creation)</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'index']); ?>">Planner Requests</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'approvalStatus']); ?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'report']); ?>">PS Report</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'progressReport']); ?>">PS Progress Report</a></li>
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
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequest', 'action' => 'add']); ?>">Create Material Request</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequest', 'action' => 'index']); ?>">Requests</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequest', 'action' => 'statusReport']); ?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequest', 'action' => 'report']); ?>">Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                PRODUCTION REJECTION NOTE FORM<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Prnf', 'action' => 'add']); ?>">PRN Create</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Prnf', 'action' => 'index']); ?>">PRN Requests</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'Prnf', 'action' => 'statusReport']); ?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'Prnf', 'action' => 'report']); ?>">Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                STORE CREDIT NOTE (SCN)<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Scn','action'=>'add']);?>">SCN Create</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Scn','action'=>'index']);?>">SCN Requests</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'Scn','action'=>'statusReport']);?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'Scn','action'=>'report']);?>">Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                FINISH GOODS TRANSFER Note(FGTT)<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Fgtt','action'=>'add']);?>">FGTT Create</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Fgtt','action'=>'index']);?>">FGTT Requests</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'Fgtt','action'=>'statusReport']);?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'Fgtt','action'=>'report']);?>">Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                NON BILLING DELIVERY ORDER<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Nbdo','action'=>'add']);?>">NBDO Create</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Nbdo','action'=>'index']);?>">NBDO Requests</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'Nbdo','action'=>'statusReport']);?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'Nbdo','action'=>'report']);?>">Report</a></li>
            </ul>
        </div>
    </ul>
</div>
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
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'add']); ?>">Create Serial Number</a></li><?php endif; ?>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'index']); ?>">Requests</a></li>
                <li class="color-hsh3"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'statusReport']); ?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'report']); ?>">CSN Report</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller' => 'SerialNumber', 'action' => 'monthlyReport']); ?>">CSN Monthly Report</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                PRODUCTION PLANNER &nbsp;
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'main']); ?>">Production Scheduler</a></li>
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'scheduler']); ?>">Planner Daily Operation Scheduler</a></li>
                <li class="color-hsh3"><a href="<?php echo $this->Url->build(['controller' => 'Ps', 'action' => 'monthlyScheduler']); ?>">Production Monthly Schedule Form(Creation)</a></li><?php endif; ?>
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
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'index'])?>">MIT Request List</a></li><?php endif; ?>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'add'])?>">MIT Form Create</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'verify'])?>">MIT Verification</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'approval'])?>">MIT Approval</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'acknowledge'])?>">MIT Acknowlegement</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'acknowledgeVerify'])?>">MIT Acknowlegement Form</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'acknowledgeVerify'])?>">MIT Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'mit','action'=>'report'])?>">MIT Reporting</a></li>
            </ul>
        </div>

        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                WORK IN PROGRESS<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'add'])?>">WIP Create</a></li><?php endif; ?>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'view'])?>">WIP List</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'view'])?>">WIP Acknowladge</a></li>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'report'])?>">WIP Report</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'welding1'])?>">WIP Section Report Welding</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'mlt'])?>">Main Line Tank</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'dm'])?>">Drive Mechanism</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'vc'])?>">Vacuum Chamber</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'welding2'])?>">Welding</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'bta'])?>">BTA</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'mc'])?>">Metal Clad</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'writing'])?>">Wiring</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'testing'])?>">Testing</a></li>

                <li class="color-hsh3"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'statReport'])?>">WIP Statistic Report</a></li>
                <li class="color-hsh3"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'monthlyProgress'])?>">WIP Staff Progress Report-monthly 1</a></li>
                <li class="color-hsh3"><a href="<?php echo $this->Url->build(['controller'=>'wip','action'=>'monthlyProgress2'])?>">WIP Staff Progress Report-monthly 2</a></li>
            </ul>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                MATERIAL REQUEST<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequest', 'action' => 'add']); ?>">Create Material Request</a></li><?php endif; ?>
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
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller' => 'Prnf', 'action' => 'add']); ?>">PRN Create</a></li><?php endif; ?>
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
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Scn','action'=>'add']);?>">SCN Create</a></li><?php endif; ?>
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
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Fgtt','action'=>'add']);?>">FGTT Create</a></li><?php endif; ?>
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
                <?php if($role == 'requester'): ?><li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Nbdo','action'=>'add']);?>">NBDO Create</a></li><?php endif; ?>
                <li class="color-hsh"><a href="<?php echo $this->Url->build(['controller'=>'Nbdo','action'=>'index']);?>">NBDO Requests</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'Nbdo','action'=>'statusReport']);?>">Approval Status</a></li>
                <li class="color-hsh2"><a href="<?php echo $this->Url->build(['controller'=>'Nbdo','action'=>'report']);?>">Report</a></li>
            </ul>
        </div>
    </ul>
</div>
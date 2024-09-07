<div class="row d-flex flex-wrap">
    <?php foreach ($model_course as $data) { ?>
    <div class="col- col-sm-6 col-md-4 h-100">
        <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
                Digital Strategist
            </div>
            <div class="card-body pt-0 flex-grow-1">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b><?=$data->Course_Name?></b></h2>
                        <p class="text-muted text-sm"><b>About: </b> <?=$data->Description ?> </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:
                                <?=$data->Contact ?></li>
                            <li class="small"><span class="fa-li"><i class="fas fa-tags"></i></span> Price:
                                <?=$data->price ?></li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="/images/study-8.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

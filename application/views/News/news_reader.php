
        <div class="content-wrapper">
          <div class="container">
            <div class="col-sm-12">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <h1 class="font-weight-600 mb-4">
                        <?php echo $news->title ?>
                      </h1>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">

                        <div class="col-sm-12 grid-margin">
                          <div class="rotate-img">
                            <img
                              src="<?php echo base_url('assets/images/news/'.$news->photo_name) ?>"
                              alt="banner"
                              class="img-fluid"
                            />
                          </div>
                        </div>
                        <div class="col-sm-8 grid-margin">
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2"><?php echo date_format(date_create($news->created_at), "d-M-Y H:i:s")?></span>
                          </p>
                          <p class="fs-15">
                            <?php echo $news->content?>
                          </p>
                        </div>
                        <h3 style="margin-top: 1em" class="text-center col-12">==============================</h3>
                    </div>
                    
                    <div class="col-lg-4">
                      <h2 class="mb-4 text-primary font-weight-600">
                        Berita terbaru
                      </h2>

                      <?php foreach($latest_news as $news){ ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="border-bottom pb-4 pt-4">
                            <div class="row">
                              <div class="col-sm-8">
                                <h5 class="font-weight-600 mb-1">
                                  <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($news->title, 0, 30)).'/'.base64_encode($news->id)) ?>">
                                    <?php echo substr($news->title, 0, 20)."..." ?>
                                  </a>
                                </h5>
                                <p class="fs-13 text-muted mb-0">
                                  <span class="mr-2"><?php echo date_format(date_create($news->created_at), "d-M-Y H:i:s")?></span>
                                </p>
                              </div>
                              <div class="col-sm-4">
                                <div class="rotate-img">
                                <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($news->title, 0, 30)).'/'.base64_encode($news->id)) ?>">
                                  <img
                                    src="<?php echo base_url('assets/images/news/'.$news->photo_name) ?>"
                                    alt="banner"
                                    class="img-fluid"
                                  />
                                </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>

                      
                      <div class="trending">
                        <h2 class="mb-4 text-primary font-weight-600">
                          Populer
                        </h2>

                        <?php foreach($popular as $news){ ?>
                        <div class="mb-4">
                          <div class="rotate-img">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($news->title, 0, 30)).'/'.base64_encode($news->id)) ?>">
                            <img
                              src="<?php echo base_url('assets/images/news/'.$news->photo_name) ?>"
                              alt="banner"
                              class="img-fluid"
                            />
                          </a>
                          </div>
                          <h3 class="mt-3 font-weight-600">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($news->title, 0, 30)).'/'.base64_encode($news->id)) ?>">
                            <?php echo $news->title ?>
                          </a>
                          </h3>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2"><?php echo date_format(date_create($news->created_at), "d-M-Y H:i:s")?></span>
                          </p>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->
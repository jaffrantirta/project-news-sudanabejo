

        <!-- partial -->
        <!-- <div class="flash-news-banner">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <span class="badge badge-dark mr-3">Populer</span>
                <p class="mb-0">
                  Lorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s.
                </p>
              </div>
              <div class="d-flex">
                <span class="mr-3 text-danger">Wed, March 4, 2020</span>
                <span class="text-danger">30°C,London</span>
              </div>
            </div>
          </div>
        </div> -->

        <div class="content-wrapper">
          <div class="container">
            <div class="row" data-aos="fade-up">

              <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                <a style="color: white" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($headline[0]->title, 0, 30)).'/'.base64_encode($headline[0]->id)) ?>">
                  <img
                    src="<?php echo base_url('assets/images/news/'.$headline[0]->photo_name) ?>"
                    alt="banner"
                    class="img-fluid"
                  />
                </a>
                  <div class="banner-content">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                    <?php echo $headline[0]->category_name ?>
                    </div>
                    <h1 class="mb-0"><a style="color: white" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($headline[0]->title, 0, 30)).'/'.base64_encode($headline[0]->id)) ?>"><?php echo substr($headline[0]->title, 0, 65)."..." ?></a></h1>
                    <!-- <h1 class="mb-2">
                    
                    </h1> -->
                    <div class="fs-12">
                      <span class="mr-2"><?php echo $headline[0]->created_at?></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Berita terbaru</h2>

                    <?php foreach($latest_news as $ln){ ?>

                    <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                      <div class="pr-3">
                        <h5><a style="color: white" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($ln->title, 0, 30)).'/'.base64_encode($ln->id)) ?>"><?php echo $ln->title ?></a></h5>
                        <div class="fs-12">
                          <span class="mr-2"><?php echo $ln->created_at?></span>
                        </div>
                      </div>
                      <div class="rotate-img">
                        <!-- <img src="<?php echo base_url('assets/images/news/'.$ln->photo_news) ?>" alt="thumb" class="img-fluid img-sm"/> -->
                      </div>
                    </div>

                    <?php } ?>

                    
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Kategori</h2>
                    <ul class="vertical-menu">
                      <?php foreach($all_categories as $ac){ ?>
                      <li><a href="<?php echo base_url('news/categories/'.$ac->name) ?>"><?php echo $ac->name ?></a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">

                  <?php foreach($popular as $p){ ?>

                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($p->title, 0, 30)).'/'.base64_encode($p->id)) ?>">
                            <img
                              src="<?php echo base_url('assets/images/news/'.$p->photo_name) ?>"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </a>
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >Populer</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <h2 class="mb-2 font-weight-600">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($p->title, 0, 30)).'/'.base64_encode($p->id)) ?>">
                            <?php echo $p->title ?>
                          </a>
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2"><?php echo $p->created_at?></span>
                        </div>
                        <p class="mb-0">
                        <?php echo substr($p->content, 0, 200)."..."?>
                        </p>
                      </div>
                    </div>

                    <?php } ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="card-title">
                          Rekomendasi
                        </div>

                        <div class="row">

                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                              <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[0]->title, 0, 30)).'/'.base64_encode($recommendation[0]->id)) ?>">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$recommendation[0]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </a>
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    ><?php echo $recommendation[0]->category_name ?></span
                                  >
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                              <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[1]->title, 0, 30)).'/'.base64_encode($recommendation[1]->id)) ?>">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$recommendation[1]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </a>
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    ><?php echo $recommendation[1]->category_name ?></span
                                  >
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                              <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[2]->title, 0, 30)).'/'.base64_encode($recommendation[3]->id)) ?>">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$recommendation[2]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </a>
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    ><?php echo $recommendation[2]->category_name ?></span
                                  >
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                              <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[3]->title, 0, 30)).'/'.base64_encode($recommendation[3]->id)) ?>">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$recommendation[3]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </a>
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    ><?php echo $recommendation[3]->category_name ?></span
                                  >
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <div class="card-title">
                            
                          </div>
                          <p class="mb-3">Lihat semua</p>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                            <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[4]->title, 0, 30)).'/'.base64_encode($recommendation[4]->id)) ?>">
                              <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[4]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[4]->title, 0, 30)).'/'.base64_encode($recommendation[4]->id)) ?>">
                          <?php echo $recommendation[4]->title ?>
                          </a>
                          </h3>
                        </div>
                        
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                            <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[5]->title, 0, 30)).'/'.base64_encode($recommendation[5]->id)) ?>">  
                            <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[5]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </a>
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[5]->title, 0, 30)).'/'.base64_encode($recommendation[5]->id)) ?>">
                          <?php echo $recommendation[5]->title ?>
                          </a>
                          </h3>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                            <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[6]->title, 0, 30)).'/'.base64_encode($recommendation[6]->id)) ?>">  
                            <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[6]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </a>
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[6]->title, 0, 30)).'/'.base64_encode($recommendation[6]->id)) ?>">
                          <?php echo $recommendation[6]->title ?>
                          </a>
                          </h3>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                            <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[7]->title, 0, 30)).'/'.base64_encode($recommendation[7]->id)) ?>">  
                            <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[7]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </a>
                            </div>
                          </div>
                          <h3 class="font-weight-600">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[7]->title, 0, 30)).'/'.base64_encode($recommendation[7]->id)) ?>">
                          <?php echo $recommendation[7]->title ?>
                          </a>
                          </h3>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-center pt-3"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                            <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[8]->title, 0, 30)).'/'.base64_encode($recommendation[8]->id)) ?>">  
                            <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[8]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </a>
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                          <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($recommendation[8]->title, 0, 30)).'/'.base64_encode($recommendation[8]->id)) ?>">
                          <?php echo $recommendation[8]->title ?>
                          </a>
                          </h3>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6">
                        <div class="card-title">
                          Pilihan kami
                        </div>
                        <div class="row">
                          <div class="col-xl-6 col-lg-8 col-sm-6">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url('assets/images/news/'.$our_choice[0]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                            <h2 class="mt-3 text-primary mb-2">
                            <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[0]->title, 0, 30)).'/'.base64_encode($our_choice[0]->id)) ?>">
                            <?php echo substr($our_choice[0]->title, 0, 20)."..."?>
                            </h2>
                            <p class="fs-13 mb-1 text-muted">
                              <span class="mr-2"><?php echo $our_choice[0]->created_at?></span>
                            </p>
                            <p class="my-3 fs-15">
                            <?php echo substr($our_choice[0]->content, 0, 40)."..."?>
                            </p>
                            <a href="#" class="font-weight-600 fs-16 text-dark"
                              >Baca selengkapnya</a
                            >
                          </div>
                          <div class="col-xl-6 col-lg-4 col-sm-6">
                            <div class="border-bottom pb-3 mb-3">
                              <h3 class="font-weight-600 mb-0">
                              <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[1]->title, 0, 30)).'/'.base64_encode($our_choice[1]->id)) ?>">
                              <?php echo substr($our_choice[1]->title, 0, 20)."..."?>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $our_choice[1]->created_at?></span>
                              </p>
                              <p class="mb-0">
                                <?php echo substr($our_choice[1]->content, 0, 30)."..."?>
                              </p>
                            </div>
                            <div class="border-bottom pb-3 mb-3">
                              <h3 class="font-weight-600 mb-0">
                              <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[2]->title, 0, 30)).'/'.base64_encode($our_choice[2]->id)) ?>">
                              <?php echo substr($our_choice[2]->title, 0, 20)."..."?>
                              </a>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $our_choice[2]->created_at?></span>
                              </p>
                              <p class="mb-0">
                                <?php echo substr($our_choice[2]->content, 0, 30)."..."?>
                              </p>
                            </div>
                            <div class="border-bottom pb-3 mb-3">
                              <h3 class="font-weight-600 mb-0">
                              <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[3]->title, 0, 30)).'/'.base64_encode($our_choice[3]->id)) ?>">
                              <?php echo substr($our_choice[3]->title, 0, 20)."..."?>
                              </a>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $our_choice[3]->created_at?></span>
                              </p>
                              <p class="mb-0">
                                <?php echo substr($our_choice[3]->content, 0, 30)."..."?>
                              </p>
                            </div>
                            <div>
                              <h3 class="font-weight-600 mb-0">
                              <a style="color: black" href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[4]->title, 0, 30)).'/'.base64_encode($our_choice[4]->id)) ?>">
                              <?php echo substr($our_choice[4]->title, 0, 20)."..."?>
                              </a>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $our_choice[4]->created_at?></span>
                              </p>
                              <p class="mb-0">
                                <?php echo substr($our_choice[4]->content, 0, 30)."..."?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="card-title">
                              
                            </div>
                            <div class="border-bottom pb-3">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$our_choice[5]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <a href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[5]->title, 0, 30)).'/'.base64_encode($our_choice[5]->id)) ?>" class="fs-16 font-weight-600 mb-0 mt-3">
                              <?php echo substr($our_choice[5]->title, 0, 20)."..."?>
                              </a>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $our_choice[5]->created_at?></span>
                              </p>
                            </div>
                            <div class="pt-3 pb-3">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$our_choice[6]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <a href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[6]->title, 0, 30)).'/'.base64_encode($our_choice[6]->id)) ?>" class="fs-16 font-weight-600 mb-0 mt-3">
                              <?php echo substr($our_choice[6]->title, 0, 20)."..."?>
                              </a>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $our_choice[6]->created_at?></span>
                              </p>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="card-title">
                              
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="<?php echo base_url('assets/images/news/'.$our_choice[7]->photo_name) ?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <a href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[7]->title, 0, 30)).'/'.base64_encode($our_choice[7]->id)) ?>" class="fs-16 font-weight-600 mb-0">
                                      <?php echo substr($our_choice[7]->title, 0, 20)."..."?>
                                      </a>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2"><?php echo $our_choice[7]->created_at?></span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                      <?php echo substr($our_choice[7]->content, 0, 20)."..."?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3 pt-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="<?php echo base_url('assets/images/news/'.$our_choice[8]->photo_name) ?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <a href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[8]->title, 0, 30)).'/'.base64_encode($our_choice[8]->id)) ?>" class="fs-16 font-weight-600 mb-0">
                                        <?php echo substr($our_choice[8]->title, 0, 20)."..."?>
                                      </a>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2"><?php echo $our_choice[8]->created_at?></span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                      <?php echo substr($our_choice[8]->content, 0, 20)."..."?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3 pt-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="<?php echo base_url('assets/images/news/'.$our_choice[9]->photo_name) ?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <a href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[9]->title, 0, 30)).'/'.base64_encode($our_choice[9]->id)) ?>" class="fs-16 font-weight-600 mb-0">
                                        <?php echo substr($our_choice[9]->title, 0, 20)."..."?>
                                      </a>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2"><?php echo $our_choice[9]->created_at?></span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                      <?php echo substr($our_choice[9]->content, 0, 20)."..."?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="pt-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="<?php echo base_url('assets/images/news/'.$our_choice[10]->photo_name) ?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <a href="<?php echo base_url('news/consumer/'.str_replace(" ", "-", substr($our_choice[10]->title, 0, 30)).'/'.base64_encode($our_choice[10]->id)) ?>" class="fs-16 font-weight-600 mb-0">
                                        <?php echo substr($our_choice[10]->title, 0, 20)."..."?>
                                      </a>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2"><?php echo $our_choice[10]->created_at?></span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                      <?php echo substr($our_choice[10]->content, 0, 20)."..."?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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

        

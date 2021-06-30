<!-- partial -->
    <div class="flash-news-banner">
      <div class="content-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <div class="aboutus-wrapper">
                    <h1 class="mt-5 text-center mb-5">
                      Kontak kami
                    </h1>
                    <div class="row">
                      <div class="col-lg-12 mb-5 mb-sm-2">
                        <form>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <textarea
                                  class="form-control textarea"
                                  placeholder="Komentar"
                                  id="comment"
                                ></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="name"
                                  placeholder="Nama"
                                  value="<?php echo $login['data']['name'] ?>"
                                />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="email"
                                  placeholder="Email"
                                  value="<?php echo $login['data']['email'] ?>"
                                />
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <a
                                  onclick="insert_comment()"
                                  href="#comment"
                                  class="btn btn-lg btn-dark font-weight-bold mt-3"
                                  >Kirim pesan</a
                                >
                              </div>
                            </div>
                          </div>
                        </form>
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
    <!-- container-scroller ends -->
    <!-- partial:../partials/_footer.html -->
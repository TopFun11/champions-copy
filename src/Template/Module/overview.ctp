
  <div class="row">
      <div class="c4h-home-jumbo jumbotron" style="background-image:url('<?= ($module->banner) ?>')">
          <h1><?= ($module->title) ?></h1>
          <p> Tagline here </p>
      </div>
  </div>

  <div class="row">

              <div class="headerbox-header">
                  <h3>Intro title here</h3>
              </div>
              <p> <?= ($module->description_text) ?> </p>

  </div>

  <div class="row">
    <div class="enroll-buttons">
      <a href="/module/enroll/<?=$module->id?>" title="Title Link">
            <div class="btn btn-success">
              Enroll on <?= ($module->title) ?>
            </div>
      </a>

      <a href="/module/explore" title="Title Link">
            <div class="btn btn-danger">
              Back
            </div>
      </a>

    </div>
  </div>

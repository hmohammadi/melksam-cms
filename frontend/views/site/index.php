<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;
use frontend\models\Property;
$this->title = 'املاک';
?>


<div class="header__search container">
    <form>
        <div class="search">
            <div class="search__type dropdown">
                <a href="index.html" data-toggle="dropdown"><i class="zmdi zmdi-chevron-down"></i> خرید یا اجاره؟</a>

                <div class="dropdown-menu">
                    <div>
                        <input type="radio" name="property-type" value="اجاره">
                        <span>اجاره</span>
                    </div>
                    <div>
                        <input type="radio" name="property-type" value="خرید">
                        <span>خرید</span>
                    </div>
                </div>
            </div>

            <div class="search__body">
                <input type="text" class="search__input" placeholder=" استان، شهر یا محله مورد نظر خود را وارد کنید" data-rmd-action="advanced-search-open">

                <div class="search__advanced">
                    <div class="col-sm-6">
                        <div class="form-group form-group--float">
                            <input type="text" class="form-control" value="New York, NY">
                            <label>Location</label>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ownership Type</label>

                            <select class="select2">
                                <option value="">Single Family Home</option>
                                <option value="">Condo</option>
                                <option value="">Townhome</option>
                                <option value="">Apartment Community</option>
                                <option value="">Room</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group form-group--range">
                            <label>Price Range</label>
                            <div class="input-slider-values clearfix">
                                <div class="pull-left"><span>$</span><span id="property-price-upper"></span></div>
                                <div class="pull-right"><span>$</span><span id="property-price-lower"></span></div>
                            </div>
                            <div id="property-price-range"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group form-group--range">
                            <label>Area Size (sqft)</label>
                            <div class="input-slider-values clearfix">
                                <div class="pull-left" id="property-area-upper"></div>
                                <div class="pull-right" id="property-area-lower"></div>
                            </div>
                            <div id="property-area-range"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Bedrooms</label>
                            <div class="btn-group btn-group-justified" data-toggle="buttons">
                                <label class="btn">
                                    <input type="checkbox" name="advanced-search-beds" id="bed1">1
                                </label>
                                <label class="btn active">
                                    <input type="checkbox" name="advanced-search-beds" id="bed2" checked>2
                                </label>
                                <label class="btn">
                                    <input type="checkbox" name="advanced-search-beds" id="bed3">3
                                </label>
                                <label class="btn">
                                    <input type="checkbox" name="advanced-search-beds" id="bed4">4
                                </label>
                                <label class="btn">
                                    <input type="checkbox" name="advanced-search-beds" id="bed5">4+
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Bathrooms</label>
                            <div class="btn-group btn-group-justified" data-toggle="buttons">
                                <label class="btn active">
                                    <input type="checkbox" name="advanced-search-baths" id="bath1" checked>1
                                </label>
                                <label class="btn">
                                    <input type="checkbox" name="advanced-search-baths" id="bath2">2
                                </label>
                                <label class="btn">
                                    <input type="checkbox" name="advanced-search-baths" id="bath3">3
                                </label>
                                <label class="btn">
                                    <input type="checkbox" name="advanced-search-baths" id="bath4">4
                                </label>
                                <label class="btn">
                                    <input type="checkbox" name="advanced-search-baths" id="bath5">4+
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 m-t-10">
                        <button class="btn btn-primary">Search</button>
                        <button class="btn btn-link" data-rmd-action="advanced-search-close">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="header__recommended">
    <div class="my-location">
        <div class="my-location__title">پیشنهادات ویژه <i class="zmdi zmdi-star mdc-text-amber animated infinite tada"></i> </div>
    </div>

    <div class="listings-grid">
      <?php
        $myModels = $dataProvider->getModels();
        foreach ($myModels as $listings):
      ?>
      <div class="listings-grid__item">
          <a href="<?=\yii\helpers\Url::to(['property/listing-detail','id'=>$listings->id]) ?>">
              <div class="listings-grid__main">
                <?php if($listings->pic==null): ?>
                    <img src="/uploads/no_image.jpg" class="img-responsive" alt="<?= $listings->dealingType->name ?> <?= $listings->propertyType->name ?> <?= $listings->area_size ?> متری در <?= $listings->city->name?>">
                <?php else: ?>
                    <?php $picture= explode(',',$listings->pic); ?>
                    <img src="<?=Yii::$app->homeUrl;?><?=$picture[0]?>" alt="            <?= $listings->dealingType->name ?> <?= $listings->propertyType->name ?> <?= $listings->area_size ?> متری در <?= $listings->city->name?>">
                <?php endif ?>
                  <div class="listings-grid__price"><?=$listings->total_price?> تومان</div>
              </div>

              <div class="listings-grid__body">
                  <small><?= $listings->city->name?>، <?= $listings->region->name; ?></small>
                  <h5><?= $listings->dealingType->name ?> <?= $listings->propertyType->name ?> <?= $listings->area_size ?> متری</h5>
              </div>

              <ul class="listings-grid__attrs">
                  <li><i class="listings-grid__icon listings-grid__icon--bed"></i> <?= $listings->number_of_rooms; ?> خوابه </li>
                  <li><i class="listings-grid__icon listings-grid__icon--parking"></i> <?= $listings->number_of_parkings; ?> </li>
              </ul>
          </a>

          <div class="actions listings-grid__favorite">
              <div class="actions__toggle">
                  <input type="checkbox">
                  <i class="zmdi zmdi-favorite-outline"></i>
                  <i class="zmdi zmdi-favorite"></i>
              </div>
          </div>
      </div>
    <?php endforeach; ?>

    </div>
</div>
</header>

<section class="section">
<div class="container">
    <header class="section__title">
        <?php $property_count= Property::find()->where(['status' => 1])->count(); ?>
        <h2><?= $property_count ?> ملک برای فروش و اجاره</h2>
        <small>آپارتمان، خانه های ویلایی، املاک تجاری و مغازه، واحد های اداری، زمین و ...</small>
    </header>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card__header card__header--minimal">
                    <h2>Recent Properties for Sale</h2>
                    <small>Nunc urnami tempor eget ipsum eurutrum gravida tellus</small>
                </div>

                <div class="grid-widget grid-widget--listings">
                    <div class="col-xs-6">
                        <a class="grid-widget__item" href="listing-detail.html">
                            <img src="img/demo/listing/thumbs/9.jpg" alt="">

                            <div class="grid-widget__info">
                                <h3>$3,452,000</h3>
                                <small>4313 Beverly Hills, CA 90210</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a class="grid-widget__item" href="listing-detail.html">
                            <img src="img/demo/listing/thumbs/10.jpg" alt="">

                            <div class="grid-widget__info">
                                <h3>$990,000</h3>
                                <small>San Francisco, CA 937202</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a class="grid-widget__item" href="listing-detail.html">
                            <img src="img/demo/listing/thumbs/11.jpg" alt="">

                            <div class="grid-widget__info">
                                <h3>1,500,000</h3>
                                <small>21 Shop St, San Francisco</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a class="grid-widget__item" href="listing-detail.html">
                            <img src="img/demo/listing/thumbs/12.jpg" alt="">

                            <div class="grid-widget__info">
                                <h3>$1,650,690</h3>
                                <small>13 Beverly Hills, CA 01210</small>
                            </div>
                        </a>
                    </div>
                </div>

                <a class="view-more" href="http://bootstrapsale.com/projects/roost/v1-0/grid-listings.html">
                    View all properties for sale <i class="zmdi zmdi-long-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card__header card__header--minimal">
                    <h2>Recent Properties for Rent</h2>
                    <small>Suspendisse quis massa fringilla sagittis velit utultrices tellus</small>
                </div>

                <div class="grid-widget grid-widget--listings">
                    <div class="col-xs-6">
                        <a class="grid-widget__item" href="listing-detail.html">
                            <img src="img/demo/listing/thumbs/13.jpg" class="img-responsive" alt="">
                            <div class="grid-widget__info">
                                <h3>$1,810,000</h3>
                                <small>4313 Beverly Hills, CA 90210</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a class="grid-widget__item" href="listing-detail.html">
                            <img src="img/demo/listing/thumbs/14.jpg" alt="">
                            <div class="grid-widget__info">
                                <h3>$1,782,890</h3>
                                <small>700 Folcon St, San Fransisco, CA</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a class="grid-widget__item" href="listing-detail.html">
                            <img src="img/demo/listing/thumbs/15.jpg" alt="">
                            <div class="grid-widget__info">
                                <h3>$823,000</h3>
                                <small>1100 Sea avn, San Fransisco, CA</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a class="grid-widget__item" href="listing-detail.html">
                            <img src="img/demo/listing/thumbs/16.jpg" alt="">
                            <div class="grid-widget__info">
                                <h3>$2,543,000</h3>
                                <small>132 04th St, San Francisco</small>
                            </div>
                        </a>
                    </div>
                </div>

                <a class="view-more" href="http://bootstrapsale.com/projects/roost/v1-0/grid-listings.html">
                    View all properties for rent <i class="zmdi zmdi-long-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card__header card__header--minimal">
                    <h2>Properties by top locations</h2>
                    <small>Pellentesque habitant morbi tristique senectus et netus et malesuada</small>
                </div>

                <div class="grid-widget grid-widget--listings">
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/san_fransisco.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>San Francisco, CA</h4>
                                <small>1560 Listings</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/san_jose.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>San Jose, CA</h4>
                                <small>1232 Listings</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/denver.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Denver, CO</h4>
                                <small>1103 Listings</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/san_diego.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>San Diego, CA</h4>
                                <small>1100 Listings</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/dallas.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Dallas, TX</h4>
                                <small>988 Listings</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/detroit.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Dallas, TX</h4>
                                <small>921 Listings</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/los_angeles.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Los Angeles, CA</h4>
                                <small>888 Listings</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/nashville.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Nashville, TN</h4>
                                <small>743 Listings</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="index.html">
                            <img src="img/demo/locations/palm_bay.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Palm Bay, FL</h4>
                                <small>655 Listings</small>
                            </div>
                        </a>
                    </div>
                </div>

                <a class="view-more" href="http://bootstrapsale.com/projects/roost/v1-0/grid-listings.html">
                    View all locations <i class="zmdi zmdi-long-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card__header card__header--minimal">
                    <h2>Properties by Agents</h2>
                    <small>Duis congue placerat libero in tristique dignissim posuere</small>
                </div>

                <div class="grid-widget grid-widget--listings">
                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/1.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>David Willson</h4>
                                <small>154 Listings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/2.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Mallinda Hollaway</h4>
                                <small>143 Listings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/3.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Priscilla Erickson</h4>
                                <small>121 Listings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/4.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Randolph Barnett</h4>
                                <small>112 Listings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/5.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Bradford Watson</h4>
                                <small>98 Listings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/6.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Mauris congue ex quis est dictum iaculis</h4>
                                <small>83 Listings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/7.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Mauris congue ex quis est dictum iaculis</h4>
                                <small>80 Listings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/8.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Mauris congue ex quis est dictum iaculis</h4>
                                <small>62 Listings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <a class="grid-widget__item" href="agent-detail.html">
                            <img src="img/demo/people/9.jpg" alt="">

                            <div class="grid-widget__info">
                                <h4>Mauris congue ex quis est dictum iaculis</h4>
                                <small>59 Listings</small>
                            </div>
                        </a>
                    </div>
                </div>

                <a class="view-more" href="agents.html">
                    View all agents <i class="zmdi zmdi-long-arrow-right"></i>
                </a>

            </div>
        </div>
    </div>
</div>
</section>
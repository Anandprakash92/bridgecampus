<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\widgets\Menu;
?>    
    <aside class="main-sidebar">
      <section class="sidebar">
        <?php echo Menu::widget([
          'options' => ['class' => 'sidebar-menu', 'id'=>'side-menu','data-widget'=>"tree"],
          'items' => [
            ['label' => '<i class="fa fa-home"></i> <span>Dashboard</span>', 'url' => ['/site/dashboard']],
            ['label' => '<i class="fa fa-book" aria-hidden="true"></i> <span>Courses</span>', 'url' => ['/courses/index']],
            ['label' => '<i class="fa fa-university" aria-hidden="true"></i> <span>Universities</span>', 'url' => ['/university/index']],
            ['label' => '<i class="fa fa-building" aria-hidden="true"></i> <span>Colleges</span>', 'url' => ['/college/index']],
            ['label' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Exams</span>', 'url' => ['/exam/index']],
            ['label' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Notifications</span>', 'url' => ['/notification/index']],
            ['label' => '<i class="fa fa-file-text" aria-hidden="true"></i> <span>News / Articals</span>', 'url' => ['/news-artical/index']],
            ['label' => '<i class="fa fa-user" aria-hidden="true"></i> <span>User</span>', 'url' => ['/user/index']],
            // ['label' => '<i class="fa fa-tasks" aria-hidden="true"></i> <span> Advertisement</span>', 'url' => ['/advertise/index']],
            [
              'label' => 'Advertisement',
              'url' => ['advertise/index'],
              'options'=>['class'=>'treeview'],
              'template' => '<a href="#"><span>{label}</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span></a>',
              'items' => [
                ['label' => 'Classified Ads', 'url' => ['/advertise-classified-display-ad-locations/index']],
                // ['label' => 'Display Ads', 'url' => ['/advertise/index']],
                ['label' => 'Display Ads', 'url' => ['/advertise-banner/index']],
                ['label' => 'Classified Display Ads', 'url' => ['/advertise-classified-display-ad-locations/index']],
                ['label' => 'Video Ads', 'url' => ['/advertise-video-ads/index']],
              ],
            ],
            ['label' => 'Front End', 'url' => ['/frontend/index']],
            ['label' => 'Rating', 'url' => ['/frontend/index']],
            ['label' => 'Review', 'url' => ['/frontend/index']],
            ['label' => 'Testimonials', 'url' => ['/frontend/index']],

            [
              'label' => 'Master',
              'url' => ['#'],
              'options'=>['class'=>'treeview'],
              'template' => '<a href="#"><i class="fa fa-edit"></i> <span>{label}</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span></a>',
              'items' => [
                ['label' => 'Programs', 'url' => ['/program/index']],
                ['label' => 'Specializations', 'url' => ['/specialization/index']],
                ['label' => 'Affiliations', 'url' => ['/affiliate/index']],
                [
                  'label' => 'Accreditations',
                  'url' => ['#'],
                  'options'=>['class'=>'treeview'],
                  'template' => '<a href="#"><span>{label}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span></a>',
                  'items' => [
                    ['label' => 'Accreditating Body', 'url' => ['/accredited/index']],
                    ['label' => 'NAAC Accreditations', 'url' => ['/naac-accreditation/index']],
                  ],
                  ['label' => 'Affiliations', 'url' => ['/affiliate/index']],
                ],
                [
                  'label' => 'Approvals',
                  'url' => ['#'],
                  'options'=>['class'=>'treeview'],
                  'template' => '<a href="#"><span>{label}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span></a>',
                  'items' => [
                    ['label' => 'Approving Council', 'url' => ['/approved/index']],
                    ['label' => 'Approved by Government', 'url' => ['/approved-government/index']],
                  ],
                ],
                ['label' => 'Campus Facilities', 'url' => ['/campus-facilities/index']],
                [
                'label' => 'Drop-Down Menues',
                'url' => ['#'],
                'options'=>['class'=>'treeview'],
                'template' => '<a href="#"><span>{label}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span></a>',
                'items' => [
                [
                  'label' => 'Master File Upload',
                  'url' => ['#'],
                  'options'=>['class'=>'treeview'],
                  'template' => '<a href="#"><span>{label}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span></a>',
                  'items' => [
                        ['label' => 'Courses', 'url' => ['/courses/master-course-file-upload']],
                        ['label' => 'Program', 'url' => ['/program/master-course-file-upload']],
                        ['label' => 'Specilization', 'url' => ['/specialization/master-course-file-upload']],
                        ['label' => 'University', 'url' => ['/university/master-university-file-upload']],
                        ['label' => 'College', 'url' => ['/college/master-college-file-upload']],
                    ]
                  ],
                  [
                  'label' => 'Collge Drop-Downs',
                  'url' => ['#'],
                  'options'=>['class'=>'treeview'],
                  'template' => '<a href="#"><span>{label}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span></a>',
                  'items' => [
                      ['label' => 'College Type', 'url' => ['/']],
                      // ['label' => 'Department', 'url' => ['/department/index']],
                      ['label' => 'Ownership Type', 'url' => ['/college-ownership/index']],
                    ]
                  ],
                  [
                  'label' => 'University Drop-Downs',
                  'url' => ['#'],
                  'options'=>['class'=>'treeview'],
                  'template' => '<a href="#"><span>{label}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span></a>',
                  'items' => [
                      ['label' => 'University Type', 'url' => ['/university-type-data/index']],
                      ['label' => 'Department', 'url' => ['/department/index']],
                    ]
                  ],
                  [
                  'label' => 'Course Drop-Downs',
                  'url' => ['#'],
                  'options'=>['class'=>'treeview'],
                  'template' => '<a href="#"><span>{label}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span></a>',
                  'items' => [
                      ['label' => 'Certifiation Type', 'url' => ['/course-type/index']],
                      ['label' => 'Qualification Type', 'url' => ['/course-qualification-type/index']],
                      ['label' => 'Course Duration', 'url' => ['/course-duration/index']],
                      ['label' => 'Medium of Teaching', 'url' => ['/course-mode-of-teaching/index']],
                    ]
                  ],
                  ['label' => 'Exam Level', 'url' => ['/exam-level/index']],
                  ['label' => 'Advertisement Drop-Down', 
                    'url' => ['/advertisement/index'],
                    'options'=>['class'=>'treeview'],
                    'template' => '<a href="#"><span>{label}</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span></a>',
                    'items' => [
                        ['label' => 'Ad Listing Type', 'url' => ['/advertise-type/index']],
                        ['label' => 'Ad Purpose', 'url' => ['/advertise-purpose-type/index']],
                        // ['label' => 'Display Ad Pages', 'url' => ['/']],
                        ['label' => 'Display Ad Location', 'url' => ['/adv-display-ad-location/index']],
                        // ['label' => 'Classified Ad Pages', 'url' => ['/']],
                        ['label' => 'Classified Ad Location', 'url' => ['/classified-ad-locations']],
                        // ['label' => 'Classified-Display Ad Pages', 'url' => ['/']],
                        ['label' => 'Classified-Display Ad Location', 'url' => ['/classified-display-ad-locations']],
                        ['label' => 'Video ads', 'url' => ['/advertise-video-banner']],
                      ]
                  ],
                  [
                  'label' => 'Recruiters',
                  'url' => ['/top-recruiters/index'],
                  'options'=>['class'=>'treeview'],
                  'template' => '<a href="#"><span>{label}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span></a>',
                  'items' => [
                      ['label' => 'Industry Sector', 'url' => ['/']],
                    ]
                  ],
                ],
                ],
              ],
            ],
          ],
          'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
        'encodeLabels' => false, //allows you to use html in labels
        'activateParents' => true,
      ]);

      ?>

    </section>
    <!-- /.sidebar -->
  </aside>
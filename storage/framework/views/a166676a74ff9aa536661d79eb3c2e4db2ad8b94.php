<div id="contacts" class="main8 br-12 bg-white">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="main8-1 are_any_questions_div">
                <h3 class="f-700 mb-3 lh-40 color-23"><?php echo e(__("courses.contacts.form.title")); ?></h3>
                <p class="f-500 lh-20 color-23"><?php echo e(__("courses.contacts.form.under_title")); ?></p>


                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.are-any-question-form', [])->html();
} elseif ($_instance->childHasBeenRendered('aC8ifWd')) {
    $componentId = $_instance->getRenderedChildComponentId('aC8ifWd');
    $componentTag = $_instance->getRenderedChildComponentTagName('aC8ifWd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('aC8ifWd');
} else {
    $response = \Livewire\Livewire::mount('front.are-any-question-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('aC8ifWd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="main8-2 contacts-main-div mt-lg-0 mt-4">
                <h3 class="f-700 mb-3 lh-40 color-23"><?php echo e(__("courses.contacts.info.title")); ?></h3>
                <p class="f-500 fs-16 lh-27 color-23 mb-4"
                   style="max-width: 647px;"><?php echo e(__("courses.contacts.info.under_title")); ?></p>
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="contact1 me-4">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2"><?php echo e(__("courses.contacts.info.country.ru")); ?></p>
                                    <a href="tel:+79584088828"
                                       class="color-23 f-600 fs-16 lh-20"><?php echo e(__("courses.contacts.info.phone.ru")); ?></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="contact2 me-4">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2"><?php echo e(__("courses.contacts.info.country.ua")); ?></p>
                                    <a href="tel:+380443793165"
                                       class="color-23 f-600 fs-16 lh-20"><?php echo e(__("courses.contacts.info.phone.ua")); ?></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="contact4 me-4 mb-3 mt-2">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2"><?php echo e(__("courses.contacts.info.country.le")); ?></p>
                                    <a href="tel:+37052080969"
                                       class="color-23 f-600 fs-16 lh-20"><?php echo e(__("courses.contacts.info.phone.le")); ?></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="contact3 mt-2">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2"><?php echo e(__("courses.contacts.info.country.be")); ?></p>
                                    <a href="tel:+375447755420" class="color-23 f-600 fs-16 lh-20 me-2">
                                        <p class="m-0" style="max-width: 210px; width: 100%"><?php echo e(__("courses.contacts.info.phone.be")); ?></p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="contact5 me-4">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2">E-mail</p>
                                    <a href="mailto:info@stom-academy.com" class="color-23 f-600 fs-16 lh-20">info@stom-academy.com</a>
                                </div>
                            </div>

                            <?php echo __("courses.contacts.info.soc_wp_vb_tg"); ?>


























































































                        </div>
                    </div>
                </div>
                <h3 class="color-23 f-700 lh-40 mb-4 mt-3"><?php echo e(__("courses.contacts.info.soc")); ?></h3>
                <div class="social-icons pb-3">
                    <?php echo __("courses.contacts.info.soc_group.fb"); ?>

                    <?php echo __("courses.contacts.info.soc_group.inst"); ?>

                    <?php echo __("courses.contacts.info.soc_group.tg"); ?>

                    <?php echo __("courses.contacts.info.soc_group.vk"); ?>

                    <?php echo __("courses.contacts.info.soc_group.yt"); ?>





































































                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\components\contact-form.blade.php ENDPATH**/ ?>
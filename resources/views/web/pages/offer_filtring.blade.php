<div class="row">
    @foreach ($products as $row)
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6" id="component_product">
            @include('web.component.product.productCobon', ['product' => $row])
        </div>
    @endforeach
    <div class="nav-center">
        @if ($paginates > 1)
            <nav>
                <ul class="pagination">
                    <?php if ($num != 1): ?>
                    <li class="page-item">
                        <a class="page-link page-prev paginateScroll" style="cursor: pointer" data-id="<?= $num - 1 ?>"
                            onclick="pagination(this)"></a>
                    </li>
                    <?php endif ?>

                    <?php for ($i = max(1, $num - 2); $i <= min($paginates, $num + 2); $i++): ?>
                    <li class="page-item">
                        <a class="page-link paginateScroll <?php if ($i == $num) {
                            echo 'active';
                        } ?>" style="cursor: pointer"
                            data-id="<?= $i ?>" onclick="pagination(this)"><?= $i ?></a>
                    </li>
                    <?php endfor ?>

                    <!-- Include a list item for the latest page number -->
                    <?php if ($num < $paginates - 2): ?>
                    <li class="page-item">
                        <a class="page-link paginateScroll" style="cursor: pointer">...</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link paginateScroll <?php if ($paginates == $num) {
                            echo 'active';
                        } ?>" style="cursor: pointer"
                            data-id="<?= $paginates ?>" onclick="pagination(this)"><?= $paginates ?></a>
                    </li>
                    <?php endif ?>


                    <?php if ($num != $paginates && $paginates > 1): ?>
                    <li class="page-item">
                        <a class="page-link page-next paginateScroll" style="cursor: pointer" data-id="<?= $num + 1 ?>"
                            onclick="pagination(this)"></a>
                    </li>
                    <?php endif ?>
                </ul>

                <!-- Display the latest page number outside the pagination element -->
                <p>Latest Page: <?= $paginates ?></p>
            </nav>
        @endif
    </div>


</div>

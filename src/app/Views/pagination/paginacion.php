<nav aria-label="Page navigation" class="mt-2 mb-2">
    <ul class="pagination justify-center space-x-2 flex flex-row">
        <?php if ($pager->hasPreviousPage()): ?>
            <li class="inline-block">
                <a class="px-4 py-2 border border-gray-300 bg-neutral-900 text-white rounded" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">
                    &laquo;
                </a>
            </li>
        <?php endif; ?>

        <?php foreach ($pager->links() as $link): ?>
            <li class="inline-block">
                <a class="px-4 py-2 border <?= $link['active'] ? 'bg-red-500 text-white' : 'border-gray-300 bg-neutral-900 text-white' ?> rounded" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <?php if ($pager->hasNextPage()): ?>
            <li class="inline-block">
                <a class="px-4 py-2 border border-gray-300 bg-neutral-900 text-white rounded" href="<?= $pager->getNextPage() ?>" aria-label="Next">
                    &raquo;
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

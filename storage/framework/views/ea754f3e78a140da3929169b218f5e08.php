<?php $__env->startComponent('shop::emails.layout'); ?>
    <div style="margin-bottom: 34px;">
        <p style="font-weight: bold;font-size: 20px;color: #121A26;line-height: 24px;margin-bottom: 24px">
            <?php echo app('translator')->get('shop::app.emails.dear', ['customer_name' => $invoice->order->customer_full_name]); ?>, 👋
        </p>
    </div>

    <div>
        <p><?php echo app('translator')->get('shop::app.emails.customers.reminder.invoice-overdue'); ?></p>

        <p style="margin-top: 20px;"><?php echo app('translator')->get('shop::app.emails.customers.reminder.already-paid'); ?></p>
    </div>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src\Resources\views\emails\customers\invoice-reminder.blade.php ENDPATH**/ ?>
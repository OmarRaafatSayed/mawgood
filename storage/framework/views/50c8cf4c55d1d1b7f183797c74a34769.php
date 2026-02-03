<v-charts-line <?php echo e($attributes); ?>></v-charts-line>

<?php if (! $__env->hasRenderedOnce('a1dd27a4-1f33-427e-bd39-e44004110960')): $__env->markAsRenderedOnce('a1dd27a4-1f33-427e-bd39-e44004110960');
$__env->startPush('scripts'); ?>
    <!-- SEO Vue Component Template -->
    <script
        type="text/x-template"
        id="v-charts-line-template"
    >
        <canvas
            :id="$.uid + '_chart'"
            class="flex w-full items-end"
            :style="'aspect-ratio:' + aspectRatio + '/1'"
        ></canvas>
    </script>

    <script type="module">
        app.component('v-charts-line', {
            template: '#v-charts-line-template',

            props: {
                labels: {
                    type: Array, 
                    default: [],
                },

                datasets: {
                    type: Array, 
                    default: true,
                },

                aspectRatio: {
                    type: Number, 
                    default: 3.23,
                },
            },

            data() {
                return {
                    chart: undefined,
                }
            },

            mounted() {
                this.prepare();
            },

            methods: {
                prepare() {
                    if (this.chart) {
                        this.chart.destroy();
                    }

                    this.chart = new Chart(document.getElementById(this.$.uid + '_chart'), {
                        type: 'line',
                        
                        data: {
                            labels: this.labels,

                            datasets: this.datasets,
                        },
                
                        options: {
                            aspectRatio: this.aspectRatio,
                            
                            plugins: {
                                legend: {
                                    display: false
                                },

                                
                            },
                            
                            scales: {
                                x: {
                                    beginAtZero: true,

                                    border: {
                                        dash: [8, 4],
                                    }
                                },

                                y: {
                                    beginAtZero: true,
                                    border: {
                                        dash: [8, 4],
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Admin\src\Resources\views\components\charts\line.blade.php ENDPATH**/ ?>
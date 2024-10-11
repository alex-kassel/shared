<div class="info-block">
    <div class="content-wrapper">
        <div class="content info-content">
            <div class="text-container">
                <div class="text">
                    {{ $infoText }}
                </div>
            </div>
            <div class="button-container">
                {{ $infoButton }}
            </div>
        </div>
        <div class="content details-content hidden">
            <div class="text-container">
                {{ $detailsText }}
            </div>
            <div class="button-container">
                {{ $detailsButton }}
            </div>
        </div>
    </div>
</div>

@pushOnce('styles')
    <style>
        /* Component: info-block */
        .info-block {
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        .info-block .text-container {
            overflow: auto;
        }
        .info-block .content-wrapper {
            display: flex;
            width: 200%;
            transition: transform 0.5s ease;
            height: 100%;
        }
        .info-block .content {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .info-block .button-container {
            /*margin-top: auto;*/
        }
        .info-block.show-details .content-wrapper {
            transform: translateX(-50%);
        }
    </style>
@endPushOnce

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.info-block').forEach(function(node) {
                const infoHeight = node.querySelector('.info-content .text').offsetHeight;
                node.querySelector('.info-content .text-container').style.maxHeight = `${infoHeight}px`;
                node.querySelector('.details-content .text-container').style.maxHeight = `${infoHeight}px`;
            });

            document.querySelectorAll('.info-block .button-container').forEach(container => {
                const switcherButton = container.querySelector('button[role="btn-switch"]') ?? container;
                switcherButton.addEventListener('click', function() {
                    this.closest('.info-block').classList.toggle('show-details');
                });
            });
        });
    </script>
@endpushonce



<div class="col-xl-4 col-sm-6">
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                    <p class="text-muted font-weight-medium font-weight-bold">{{ $cardData['name'] }}</p>
                    <a href="{{ route($cardData['url']) }}">
                        <button type="button" class="btn btn-light btn-sm btn-rounded" data-toggle="modal" data-target=".exampleModal">
                            <i class="mdi mdi-arrow-right-bold mr-1"></i> See {{ $cardData['name'] }}
                        </button>
                    </a>
                </div>

                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                <span class="avatar-title">
                    <i class="bx bx-copy-alt font-size-24"></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</div>

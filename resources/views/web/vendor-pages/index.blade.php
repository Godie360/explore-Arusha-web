<x-vendor-layout>
    <div class="dashboard-details">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="card dash-cards">
                    <div class="card-body">
                        <div class="dash-top-content">
                            <div class="dashcard-img">
                                <img src="assets/img/icons/verified.svg" class="img-fluid" alt>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6>Total Staffs</h6>
                            <h3 class="counter">{{ number_format($total_staffs) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card dash-cards">
                    <div class="card-body">
                        <div class="dash-top-content">
                            <div class="dashcard-img">
                                <img src="assets/img/icons/rating.svg" class="img-fluid" alt>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6>Active Staff</h6>
                            <h3>{{ number_format($active_staffs) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card dash-cards">
                    <div class="card-body">
                        <div class="dash-top-content">
                            <div class="dashcard-img">
                                <img src="assets/img/icons/chat.svg" class="img-fluid" alt>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6>Messages</h6>
                            <h3>15</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card dash-cards">
                    <div class="card-body">
                        <div class="dash-top-content">
                            <div class="dashcard-img">
                                <img src="assets/img/icons/bookmark.svg" class="img-fluid" alt>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6>Bookmark</h6>
                            <h3>30</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-vendor-layout>

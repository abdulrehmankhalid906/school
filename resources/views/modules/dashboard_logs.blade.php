<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Recent Activity</h5>

            <div class="activity">
                @foreach ($activity_log as $logs)
                    {{-- {{ dd($logs) }} --}}
                    <div class="activity-item d-flex">
                        <div class="activite-label">{{ $logs->created_at->format('m-d-y') }}<br><span>{{ $logs->created_at->format('h:i A') }}</span></div>

                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <div class="activity-content">
                            {{ $logs->description }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

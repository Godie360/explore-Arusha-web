<x-web-layout>
    @push('styles')
    @endpush
    @push('scripts')
    @endpush
    <div class="contactbanner innerbanner">
        <div class="inner-breadcrumb">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12 ">
                        <h2 class="breadcrumb-title">Complaints</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Complaints</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>

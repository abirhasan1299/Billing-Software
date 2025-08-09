@extends('master')
@section('title','Admin Details')
@section('content')
 <style>
        /* Modern card */
        body { background: linear-gradient(180deg, #f7f9fc 0%, #eef3fb 100%); font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
        .profile-card {
            max-width: 920px;
            margin: 10px auto;
            border: 0;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(16,24,40,0.08);
            overflow: hidden;
        }
        .cover {
            height: 110px;
            background: linear-gradient(90deg, #6c8ef5 0%, #9dd6ff 100%);
        }
        .avatar {
            width: 110px;
            height: 110px;
            border-radius: 999px;
            border: 6px solid #fff;
            box-shadow: 0 8px 24px rgba(36,37,42,0.06);
            object-fit: cover;
            transform: translateY(-50%);
            background: #fff;
        }
        .info-label {
            color: #6b7280;
            font-size: 0.86rem;
            letter-spacing: .2px;
            margin-bottom: 0.25rem;
        }
        .info-value {
            font-size: 1rem;
            color: #0f172a;
            font-weight: 600;
        }
        .small-muted { color: #6b7280; font-size: .875rem; }
        .role-badge { font-weight: 600; padding: .45rem .65rem; border-radius: 999px; }
        .field-row { padding: 12px 0; border-bottom: 1px dashed rgba(15,23,42,0.06); }
        .field-row:last-child { border-bottom: none; }
        .meta { font-size: .9rem; color: #475569; }
    </style>

<div class="card profile-card">
    <div class="cover"></div>

    <div class="card-body">
        <div class="row g-3">
            <!-- Left: avatar + basic -->
            <div class="col-md-4 d-flex align-items-start">
                <div class="me-3 text-center w-100">
                    <img src="{{asset('assets/images/images.png')}}" alt="Admin avatar" class="avatar mb-2">
                    <h5 class="mb-0">{{$data->name}}</h5>
                    <p class="small-muted mb-2">Administrator</p>

                </div>
            </div>

            <!-- Right: details -->
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h6 class="mb-0">Admin Details</h6>
                        <p class="small-muted mb-0">Profile & account information</p>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-success role-badge" id="roleBadge"><i class="bi bi-shield-lock-fill me-1"></i> {{strtoupper($data->role)}}</span>
                    </div>
                </div>

                <div class="mt-3">
                    <!-- Name -->
                    <div class="row field-row align-items-center">
                        <div class="col-sm-4">
                            <div class="info-label">Full name</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="info-value" id="nameValue">{{$data->name}}</div>
                        </div>
                    </div>

                    <!-- Email with copy -->
                    <div class="row field-row align-items-center">
                        <div class="col-sm-4">
                            <div class="info-label">Email address</div>
                        </div>
                        <div class="col-sm-8 d-flex align-items-center justify-content-between">
                            <div class="w-100 me-3">
                                <div class="info-value" id="emailValue">{{$data->email}}</div>
                                <div class="small-muted">Primary contact email</div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-outline-secondary btn-sm" id="copyEmailBtn" title="Copy email">
                                    <i class="bi bi-clipboard"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- Role -->
                    <div class="row field-row align-items-center">
                        <div class="col-sm-4">
                            <div class="info-label">Role</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="info-value" id="roleValue">{{strtoupper($data->role)}}</div>
                        </div>
                    </div>

                    <!-- Joined / Created at -->
                    <div class="row field-row align-items-center">
                        <div class="col-sm-4">
                            <div class="info-label">Joined</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="info-value" id="joinedValue">{{$data->created_at->format('F j, Y')}}</div>
                            <div class="meta">Member since {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</div>
                        </div>
                    </div>


                </div> <!-- mt-3 -->
            </div> <!-- right col -->
        </div> <!-- row -->
    </div> <!-- card-body -->
</div> <!-- card -->

<script>
    // Toggle password show/hide
    const toggleBtn = document.getElementById('togglePassBtn');
    const toggleIcon = document.getElementById('toggleIcon');
    const masked = document.getElementById('passwordMasked');
    const plain = document.getElementById('passwordPlain');

    toggleBtn.addEventListener('click', () => {
        const showing = plain.style.display === 'inline';
        if (showing) {
            plain.style.display = 'none';
            masked.style.display = 'inline';
            toggleIcon.className = 'bi bi-eye';
        } else {
            plain.style.display = 'inline';
            masked.style.display = 'none';
            toggleIcon.className = 'bi bi-eye-slash';
        }
    });

    // Copy email to clipboard
    const copyEmailBtn = document.getElementById('copyEmailBtn');
    copyEmailBtn.addEventListener('click', async () => {
        const email = document.getElementById('emailValue').innerText.trim();
        try {
            await navigator.clipboard.writeText(email);
            copyEmailBtn.innerHTML = '<i class="bi bi-check-lg"></i>';
            setTimeout(() => copyEmailBtn.innerHTML = '<i class="bi bi-clipboard"></i>', 1400);
        } catch (err) {
            alert('Unable to copy to clipboard');
        }
    });

    // Edit / Delete placeholders
    document.getElementById('editBtn').addEventListener('click', () => {
        // Replace with link or modal trigger
        alert('Open edit form/modal (implement routing or modal here).');
    });
    document.getElementById('deleteBtn').addEventListener('click', () => {
        if (confirm('Are you sure you want to delete this admin account?')) {
            // call deletion endpoint
            alert('Send delete request to the server.');
        }
    });

</script>


@endsection

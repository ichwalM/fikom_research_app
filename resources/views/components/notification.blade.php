{{-- components/notification.blade.php --}}

<style>
    /* Modal Animation */
    .modal-backdrop {
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
    }

    .modal-backdrop.show {
        opacity: 1;
        visibility: visible;
    }

    .modal-content {
        transform: scale(0.7) translateY(-50px);
        opacity: 0;
        transition: all 0.3s ease-out;
    }

    .modal-backdrop.show .modal-content {
        transform: scale(1) translateY(0);
        opacity: 1;
    }

    /* Success Animation */
    @keyframes successScale {
        0% { transform: scale(0); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .success-icon {
        animation: successScale 0.5s ease-out;
    }

    /* Error Animation */
    @keyframes errorShake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        75% { transform: translateX(10px); }
    }

    .error-icon {
        animation: errorShake 0.5s ease-out;
    }

    /* Pulse Animation */
    @keyframes pulse-ring {
        0% {
            transform: scale(0.8);
            opacity: 1;
        }
        100% {
            transform: scale(1.2);
            opacity: 0;
        }
    }

    .pulse-ring {
        animation: pulse-ring 1.5s ease-out infinite;
    }
</style>

{{-- Success Modal --}}
@if (session('success'))
<div id="notificationModal" class="modal-backdrop fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4">
    <div class="modal-content bg-[#212121] border-2 border-green-500 rounded-2xl max-w-md w-full p-8 relative">
        <!-- Close Button -->
        <button 
            onclick="closeNotificationModal()"
            class="absolute top-4 right-4 text-[#E0E0E0]/60 hover:text-[#E0E0E0] transition duration-300"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Success Icon -->
        <div class="text-center mb-6">
            <div class="relative inline-block">
                <!-- Pulse Ring -->
                <div class="pulse-ring absolute inset-0 rounded-full bg-green-500/30"></div>
                <!-- Main Icon -->
                <div class="success-icon relative w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-green-500 mb-3">
                Berhasil!
            </h3>
            <p class="text-[#E0E0E0]/80 text-base mb-2">
                {{ session('success') }}
            </p>
        </div>

        <!-- Success Details -->
        <div class="bg-green-500/10 border border-green-500/30 rounded-lg p-4 mb-6">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div class="flex-1">
                    <p class="text-[#E0E0E0] text-sm">
                        {{session('success')}}
                    </p>
                    <p class="text-[#E0E0E0]/70 text-xs mt-1">
                        Waktu: {{ now()->format('d M Y, H:i:s') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <button 
            onclick="closeNotificationModal()"
            class="w-full bg-green-500 text-white py-3 px-4 rounded-lg font-semibold hover:bg-green-600 transition duration-300 transform hover:scale-105"
        >
            <svg class="w-5 h-5 inline-block mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            OK, Saya Mengerti
        </button>
    </div>
</div>
@endif
@if (session('warning'))
<div id="notificationModal" class="modal-backdrop fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4">
    <div class="modal-content bg-[#212121] border-2 border-[#F39C12] rounded-2xl max-w-md w-full p-8 relative">
        <!-- Close Button -->
        <button 
            onclick="closeNotificationModal()"
            class="absolute top-4 right-4 text-[#E0E0E0]/60 hover:text-[#E0E0E0] transition duration-300"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Warning Icon -->
        <div class="text-center mb-6">
            <div class="relative inline-block">
                <div class="pulse-ring absolute inset-0 rounded-full bg-[#F39C12]/30"></div>
                <div class="success-icon relative w-20 h-20 bg-[#F39C12] rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-10 h-10 text-[#212121]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Warning Message -->
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-[#F39C12] mb-3">
                Peringatan!
            </h3>
            <p class="text-[#E0E0E0]/80 text-base">
                {{ session('warning') }}
            </p>
        </div>

        <!-- Warning Details -->
        <div class="bg-[#F39C12]/10 border border-[#F39C12]/30 rounded-lg p-4 mb-6">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-[#F39C12] mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <div class="flex-1">
                    <p class="text-[#E0E0E0] text-sm">
                        Harap perhatikan pesan ini sebelum melanjutkan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <button 
            onclick="closeNotificationModal()"
            class="w-full bg-[#F39C12] text-[#212121] py-3 px-4 rounded-lg font-semibold hover:bg-[#F39C12]/90 transition duration-300 transform hover:scale-105"
        >
            Saya Mengerti
        </button>
    </div>
</div>
@endif

<script>
    // Show modal on page load if session exists
    window.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('notificationModal');
        if (modal) {
            setTimeout(() => {
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }, 100);
        }
    });

    // Close modal function
    function closeNotificationModal() {
        const modal = document.getElementById('notificationModal');
        if (modal) {
            modal.classList.remove('show');
            document.body.style.overflow = 'auto';
            
            // Remove modal after animation
            setTimeout(() => {
                modal.remove();
            }, 300);
        }
    }

    // Close modal when clicking backdrop
    document.addEventListener('click', function(e) {
        const modal = document.getElementById('notificationModal');
        if (modal && e.target === modal) {
            closeNotificationModal();
        }
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeNotificationModal();
        }
    });

    // Auto close after 5 seconds (optional)
    @if (session('success'))
    setTimeout(() => {
        closeNotificationModal();
    }, 10000);
    @endif
</script>
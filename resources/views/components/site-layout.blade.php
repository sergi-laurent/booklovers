
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BookLovers' }}</title>
    
    <!-- TailwindCSS (Ensure correct version) -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Site Header -->
    <x-site-layout-header />

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto min-h-screen py-2 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    <!-- Site Footer -->
    <x-site-layout-footer />

</body>
</html>
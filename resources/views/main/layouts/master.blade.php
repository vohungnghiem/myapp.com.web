<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="{{ asset('') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="main_template/img/logo.png?v=2" type="image/*" />
    <link rel="stylesheet" href="main_template/css/global.min.css">
    <link rel="stylesheet" href="main_template/css/main.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <title>@yield('title')</title>
    <meta name="keywords"
        content="Việc làm tiếng Nhật, vieclamtiengnhat, việc làm tiếng nhật, thực tập sinh, thuctapsinh, tu nghiệp sinh, tunghiepsinh, xuất khẩu lao động, xuatkhaulaodong,
nhật bản, nhatban, lao động nhật bản, laodongnhatban, giới thiệu việc làm, gioithieuvieclam, tư vấn việc làm, tuvanvieclam, việc làm, vieclam, đào tạo, daotao, giáo dục
và đào tạo, giaoducvadaotao, tư vấn lao động, tuvanlaodong, lao động, laodong, tiếng nhật, tiengnhat, n1, n2, n3, n4, n5, kỹ năng, kynang, quản lý sản xuất, quanlysanxuat,
tác phong làm việc, tacphonglamviec, hợp tác lao động, hoptaclaodong, oden, kỹ sư, kysu, kỹ sư tiếng nhật, kysutiengnhat, kỹ sư làm việc tại nhật bản, kysulamviectainhatban,
nhân sự, nhansu, nhân sự cao cấp, nhansucaocap, sakura, mặt trời mọc, mattroimoc, japan, nihongo, tuyển sinh, tuyensinh, du học, duhoc, du học nhật bản, duhocnhatban,
công việc làm tiếng nhật, congvieclamtiengnhat, cơ khí, chế tạo, xây dựng, điện tử, tự động hóa, cokhi, chetao, dientu, tudonghoa, giáo viên tiếng nhật, giaovientiengnhat,
esuhai, kaizen, trường nhật ngữ, truongnhatngu, trường tiếng, truongtieng, xuất khẩu lao động uy tín, xuatkhaulaodonguytin, công ty nhật bản, congtynhatban,  congtynhat">

    <meta name="description"
        content="Thương hiệu hàng đầu trong lĩnh vực việc làm tiếng Nhật, công ty Nhật Bản tuyển dụng, xuất khẩu lao động Nhật Bản, đào tạo học tiếng Nhật, tư vấn du học Nhật Bản." />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    @include('main.layouts.menu')
    @yield('content')
    @include('main.layouts.footer')
</body>

</html>

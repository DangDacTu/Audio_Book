<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\revenue.blade.php -->
@extends('adminLayout')

@section('adminContent')
<section id="revenue-section" style="color:#fff; width:90%; margin:auto;">
    <h2 style="margin-bottom:20px;">📊 Thống kê doanh thu</h2>

    <!-- Nút xuất PDF -->
    <div style="margin-bottom:20px;">
        <a href="{{ route('admin.revenue.export_pdf') }}"
           style="display:inline-block; padding:10px 16px; background:#22c55e; color:#fff;
                  border-radius:8px; text-decoration:none; font-weight:600; transition:background 0.3s;">
            📥 Xuất PDF
        </a>
    </div>

    <!-- Tổng doanh thu -->
    <div style="margin:25px 0; background:#1e293b; padding:20px; border-radius:10px;
                box-shadow:0 4px 15px rgba(0,0,0,0.3); text-align:center;">
        <h3 style="margin:0; font-size:20px;">💰 Tổng doanh thu:
            <span style="color:#38bdf8;">{{ number_format($totalRevenue) }} VND</span>
        </h3>
    </div>

    <!-- 🟩 Biểu đồ doanh thu -->
    <div style="background:#1e293b; padding:25px; border-radius:12px; 
                box-shadow:0 4px 15px rgba(0,0,0,0.3); margin-bottom:30px; text-align:center;">
        <h4 style="margin-bottom:15px;">📈 Biểu đồ doanh thu theo sách nói</h4>
        <div style="max-width:60%; margin:auto;">
            <canvas id="revenueChart" style="width:100%; height:250px;"></canvas>
        </div>
    </div>

    <!-- 🟦 Biểu đồ tỷ lệ -->
    <div style="background:#1e293b; padding:25px; border-radius:12px; 
                box-shadow:0 4px 15px rgba(0,0,0,0.3); margin-bottom:30px; text-align:center;">
        <h4 style="margin-bottom:15px;">🧩 Tỷ lệ doanh thu theo từng sách</h4>
        <div style="max-width:50%; margin:auto;">
            <canvas id="revenuePieChart" style="width:100%; height:250px;"></canvas>
        </div>
    </div>

    <!-- 🧾 Bảng chi tiết -->
    <div style="background:#1e293b; padding:25px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.3);">
        <h4 style="margin-bottom:15px;">📚 Danh sách sách nói đã bán</h4>
        <table style="width:100%; border-collapse:collapse; color:#e2e8f0;">
            <thead>
                <tr style="background:#334155; color:#facc15; text-align:left;">
                    <th style="padding:12px 10px;">STT</th>
                    <th style="padding:12px 10px;">Tên sách nói</th>
                    <th style="padding:12px 10px;">Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($soldProducts as $key => $item)
                    <tr style="border-bottom:1px solid #475569; transition:background 0.2s;"
                        onmouseover="this.style.background='#2d3a50';"
                        onmouseout="this.style.background='transparent';">
                        <td style="padding:10px;">{{ $key + 1 }}</td>
                        <td style="padding:10px;">{{ $item->category_name }}</td>
                        <td style="padding:10px;">{{ number_format($item->category_price) }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- 🧠 Thư viện Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = @json($soldProducts->pluck('category_name'));
    const dataValues = @json($soldProducts->pluck('category_price'));

    // 🟩 Biểu đồ cột
    new Chart(document.getElementById('revenueChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu (VND)',
                data: dataValues,
                backgroundColor: '#38bdf8',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true, ticks: { color: '#fff' } },
                x: { ticks: { color: '#fff' } }
            },
            plugins: { legend: { display: false } }
        }
    });

    // 🟦 Biểu đồ tròn
    new Chart(document.getElementById('revenuePieChart'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: ['#22c55e','#38bdf8','#facc15','#f87171','#a855f7','#fb923c','#2dd4bf']
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#fff' }
                }
            }
        }
    });
</script>
@endsection

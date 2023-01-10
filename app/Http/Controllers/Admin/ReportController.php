<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Exports\RevenueExport;
use App\Exports\CustomerExport;
use App\Exports\Product_SoldExport;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;

use PDF;

class ReportController extends Controller
{
    public function revenue(Request $request)
	{
		$startDate = $request->input('start');
        $endDate = $request->input('end');

		if ($startDate && !$endDate) {
			return redirect('admin/reports/revenue');
		}

		if (!$startDate && $endDate) {
			return redirect('admin/reports/revenue');
		}

		if ($startDate && $endDate) {
			if (strtotime($endDate) < strtotime($startDate)) {
				return redirect('admin/reports/revenue');
			}

			$earlier = new \DateTime($startDate);
			$later = new \DateTime($endDate);
			$diff = $later->diff($earlier)->format("%a");

			if ($diff >= 31) {
				return redirect('admin/reports/revenue');
			}
		} else {
			$currentDate = date('Y-m-d');
			$startDate = date('Y-m-01', strtotime($currentDate));
			$endDate = date('Y-m-t', strtotime($currentDate));
		}
		$startDate = $startDate;
        $endDate = $endDate;

		$sql = "WITH recursive date_ranges AS (
			SELECT :start_date_series AS date
			UNION ALL
			SELECT date + INTERVAL 1 DAY
			FROM date_ranges
			WHERE date < :end_date_series
			),
			filtered_orders AS (
				SELECT *
				FROM orders
				WHERE DATE(order_date) >= :start_date
					AND DATE(order_date) <= :end_date
					AND status = :status
					AND payment_status = :payment_status
			)
		 SELECT
			 DISTINCT DR.date,
			 COUNT(FO.id) num_of_orders,
			 COALESCE(SUM(FO.grand_total),0) gross_revenue,
			 COALESCE(SUM(FO.tax_amount),0) taxes_amount,
			 COALESCE(SUM(FO.shipping_cost),0) shipping_amount,
			 COALESCE(SUM(FO.grand_total - FO.tax_amount - FO.shipping_cost - FO.discount_amount),0) net_revenue
		 FROM date_ranges DR
		 LEFT JOIN filtered_orders FO ON DATE(order_date) = DR.date
		 GROUP BY DR.date
		 ORDER BY DR.date ASC";

		$revenues = \DB::select(
			\DB::raw($sql),
			[
				'start_date_series' => $startDate,
				'end_date_series' => $endDate,
				'start_date' => $startDate,
				'end_date' => $endDate,
				'status' => Order::COMPLETED,
				'payment_status' => Order::PAID,
			]
		);

        $laporan = \DB::select(\DB::raw('SELECT * FROM v_bestsellers'));
        $laporan2 = \DB::select(\DB::raw('SELECT * FROM v_totalpenjualan'));
        // $laporan3 = \DB::select(\DB::raw('SELECT * FROM products'));
        $laporan3 = \DB::select(\DB::raw("SELECT DATE(order_items.created_at) AS TIME, GROUP_CONCAT(CONCAT(order_items.name, \" \", order_items.qty, \"x, \") SEPARATOR \"\\n\") AS \"LIST_TERJUAL\", GROUP_CONCAT(order_items.base_total SEPARATOR \", \\n\") AS \"HARGA\" FROM order_items\n"

        . "GROUP BY TIME;"));

		$revenues = ($startDate && $endDate) ? $revenues : [];

		if ($exportAs = $request->input('export')) {
			if (!in_array($exportAs, ['xlsx', 'pdf'])) {
				return redirect('admin/reports/revenue');
			}

			if ($exportAs == 'xlsx') {
				$fileName = 'Laporan-'. $startDate .'-'. $endDate .'.xlsx';

				return Excel::download(new RevenueExport($revenues, $laporan, $laporan2, $laporan3), $fileName);
			}

			if ($exportAs == 'pdf') {
				$fileName = 'Laporan-'. $startDate .'-'. $endDate .'.pdf';
				$pdf = PDF::loadView('admin.reports.exports.revenue-pdf', compact('revenues', 'startDate','endDate','laporan','laporan2', 'laporan3'));

				return $pdf->download($fileName);
			}
        }

		return view('admin.reports.revenue', compact('revenues','startDate','endDate', 'laporan','laporan2', 'laporan3'));
	}

    public function customer(Request $request)
	{


        $customer= \DB::select(\DB::raw('SELECT * FROM v_customerdetail'));

		if ($exportAs = $request->input('export')) {
			if (!in_array($exportAs, ['xlsx', 'pdf'])) {
				return redirect('admin/reports/customer');
			}

			if ($exportAs == 'xlsx') {
				$fileName = 'Laporan Customer.xlsx';

				return Excel::download(new CustomerExport($customer), $fileName);
			}

			if ($exportAs == 'pdf') {
				$fileName = 'Laporan Customer.pdf';
				$pdf = PDF::loadView('admin.reports.exports.customer-pdf', compact('customer'));

				return $pdf->download($fileName);
			}
        }

		return view('admin.reports.customer', compact('customer'));
	}

    public function product_sold(Request $request)
	{
		$startDate = $request->input('start');
        $endDate = $request->input('end');

		if ($startDate && !$endDate) {
			return redirect('admin/reports/revenue');
		}

		if (!$startDate && $endDate) {
			return redirect('admin/reports/revenue');
		}

		if ($startDate && $endDate) {
			if (strtotime($endDate) < strtotime($startDate)) {
				return redirect('admin/reports/revenue');
			}

			$earlier = new \DateTime($startDate);
			$later = new \DateTime($endDate);
			$diff = $later->diff($earlier)->format("%a");

			if ($diff >= 31) {
				return redirect('admin/reports/product_sold');
			}
		} else {
			$currentDate = date('Y-m-d');
			$startDate = date('Y-m-01', strtotime($currentDate));
			$endDate = date('Y-m-t', strtotime($currentDate));
		}
		$startDate = $startDate;
        $endDate = $endDate;

		// $sql = "WITH recursive date_ranges AS (
		// 	SELECT :start_date_series AS date
		// 	UNION ALL
		// 	SELECT date + INTERVAL 1 DAY
		// 	FROM date_ranges
		// 	WHERE date < :end_date_series
		// 	),
		// 	filtered_orders AS (
		// 		SELECT *
		// 		FROM orders
		// 		WHERE DATE(order_date) >= :start_date
		// 			AND DATE(order_date) <= :end_date
		// 			AND status = :status
		// 			AND payment_status = :payment_status
		// 	)
		//  SELECT
		// 	 DISTINCT DR.date,
		// 	 COUNT(FO.id) num_of_orders,
		// 	 COALESCE(SUM(FO.grand_total),0) gross_revenue,
		// 	 COALESCE(SUM(FO.tax_amount),0) taxes_amount,
		// 	 COALESCE(SUM(FO.shipping_cost),0) shipping_amount,
		// 	 COALESCE(SUM(FO.grand_total - FO.tax_amount - FO.shipping_cost - FO.discount_amount),0) net_revenue
		//  FROM date_ranges DR
		//  LEFT JOIN filtered_orders FO ON DATE(order_date) = DR.date
		//  GROUP BY DR.date
		//  ORDER BY DR.date ASC";

        $product_sold = \DB::select(\DB::raw('SELECT * FROM v_barangterjual'));
        $product_sold_export = \DB::select(\DB::raw('SELECT DATE(TIME) AS TANGGAL, LIST_TERJUAL, HARGA FROM v_barangterjual WHERE DATE(TIME) >= :start_date
                                                     AND DATE(TIME) <= :end_date '),
			[
				'start_date' => $startDate,
				'end_date' => $endDate,
			]);

		$product_sold = ($startDate && $endDate) ? $product_sold : [];

		if ($exportAs = $request->input('export')) {
			if (!in_array($exportAs, ['xlsx', 'pdf'])) {
				return redirect('admin/reports/product_sold');
			}

			if ($exportAs == 'xlsx') {
				$fileName = 'Laporan Barang Terjual-'. $startDate .'-'. $endDate .'.xlsx';

				return Excel::download(new Product_SoldExport($product_sold_export), $fileName);
			}

			if ($exportAs == 'pdf') {
				$fileName = 'Laporan-'. $startDate .'-'. $endDate .'.pdf';
				$pdf = PDF::loadView('admin.reports.exports.product_sold-pdf', compact('product_sold_export', 'startDate','endDate'));

				return $pdf->download($fileName);
			}
        }

		return view('admin.reports.product_sold', compact('product_sold','startDate','endDate',));
	}

    public function product(Request $request)
	{


        $laporan1 = \DB::select(\DB::raw('SELECT * FROM v_bestsellers'));
        $laporan2 = \DB::select(\DB::raw('SELECT * FROM products ORDER BY quantity'));

		if ($exportAs = $request->input('export')) {
			if (!in_array($exportAs, ['xlsx', 'pdf'])) {
				return redirect('admin/reports/product');
			}

			if ($exportAs == 'xlsx') {
				$fileName = 'Laporan Produk.xlsx';

				return Excel::download(new productExport($customer), $fileName);
			}

			if ($exportAs == 'pdf') {
				$fileName = 'Laporan Produk.pdf';
				$pdf = PDF::loadView('admin.reports.exports.product-pdf', compact('laporan1','laporan2'));

				return $pdf->download($fileName);
			}
        }

		return view('admin.reports.product', compact('laporan1','laporan2'));
	}
}

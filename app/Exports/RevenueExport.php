<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RevenueExport implements FromView
{

	private $_results;
    private $_results2;
    private $_results3;
    private $_results4;

	/**
	 * Create a new exporter instance.
	 *
	 * @param array $results query result
	 *
	 * @return void
	 */
	public function __construct($results,$results2,$results3, $results4)
	{
		$this->_results = $results;
        $this->_results2 = $results2;
        $this->_results3 = $results3;
        $this->_results4 = $results4;
	}

	/**
	 * Load the view.
	 *
	 * @return void
	 */
	public function view(): View
	{
		return view(
			'admin.reports.exports.revenue-excel',
			[
				'revenues' => $this->_results,
                'laporan' => $this->_results2,
                'laporan2' => $this->_results3,
                'laporan3' => $this->_results4,
			]
		);
	}
};

class CustomerExport implements FromView
{

	private $_results;

	/**
	 * Create a new exporter instance.
	 *
	 * @param array $results query result
	 *
	 * @return void
	 */
	public function __construct($results)
	{
		$this->_results = $results;
	}

	/**
	 * Load the view.
	 *
	 * @return void
	 */
	public function view(): View
	{
		return view(
			'admin.reports.exports.customer-excel',
			[
				'customer' => $this->_results
			]
		);
	}
}

class Product_SoldExport implements FromView
{

	private $_results;

	/**
	 * Create a new exporter instance.
	 *
	 * @param array $results query result
	 *
	 * @return void
	 */
	public function __construct($results)
	{
		$this->_results = $results;
	}

	/**
	 * Load the view.
	 *
	 * @return void
	 */
	public function view(): View
	{
		return view(
			'admin.reports.exports.product_sold-excel',
			[
				'product_sold' => $this->_results
			]
		);
	}
}

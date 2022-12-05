<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RevenueExport implements FromView
{

	private $_results;
    private $_results2;
    private $_results3;

	/**
	 * Create a new exporter instance.
	 *
	 * @param array $results query result
	 *
	 * @return void
	 */
	public function __construct($results,$results2,$results3)
	{
		$this->_results = $results;
        $this->_results2 = $results2;
        $this->_results3 = $results3;
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
			]
		);
	}
}

<?php
/**
 * ResponseFormatter class file.
 * @copyright (c) 2015, Galament
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace bariew\yii2Dompdf;

use DOMPDF;
use Yii;
use yii\base\Component;
use yii\web\Response;
use yii\web\ResponseFormatterInterface;

/**
 * Description.
 *
 * Usage:
 * @author Pavel Bariev <bariew@yandex.ru>
 */
class ResponseFormatter extends Component implements ResponseFormatterInterface
{

	public $options = [];

	/**
	 * @var \Closure function($pdf, $data){}
	 */
	public $beforeRender;

	/**
	 * Formats the specified response.
	 *
	 * @param Response $response the response to be formatted.
	 */
	public function format($response)
	{
		$response->getHeaders()->set('Content-Type', 'application/pdf');
		$response->content = $this->formatPdf($response);
	}

	/**
	 * Formats response HTML in PDF
	 *
	 * @param Response $response
	 * @return string
	 */
	protected function formatPdf($response)
	{
		define('DOMPDF_ENABLE_REMOTE', true);
		define('DOMPDF_UNICODE_ENABLED', true);
		require_once Yii::getAlias('@vendor/bariew/dompdf/dompdf_config.inc.php');
		$pdf = new DOMPDF();
		$pdf->load_html($response->data);
		$pdf->render();
		return $pdf->output();
	}
}

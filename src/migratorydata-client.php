<?php
namespace MigratoryData\Client;
class a
{
	public static $b = array();
	public static $c = array();
	public static $d = array();
	public static $e = array();
	const f = 0x19;
	const g = 0x7F;
	const h = 0x1E;
	const i = 0x1F;
	public static function j() {
		self::$b = array_fill(0, 128, -1);
		self::$b[k::l] = 0x01;
		self::$b[k::m] = 0x02;
		self::$b[k::n] = 0x03;
		self::$b[k::o] = 0x04;
		self::$b[k::p] = 0x05;
		self::$b[k::q] = 0x06;
		self::$b[k::r] = 0x07;
		self::$b[k::s] = 0x08;
		self::$b[k::t] = 0x09;
		self::$b[k::u] = 0x0B;
		self::$b[k::v] = 0x0C;
		self::$b[k::w] = 0x0E;
		self::$b[k::x] = 0x0F;
		self::$b[k::y] = 0x10;
		self::$b[k::z] = 0x11;
		self::$b[k::a0] = 0x12;
		self::$b[k::a1] = 0x13;
		self::$b[k::a2] = 0x14;
		self::$c = array_fill(0, 128, -1);
		self::$c[a3::a4] = 0x01;
		self::$c[a3::a5] = 0x02;
		self::$c[a3::a6] = 0x03;
		self::$c[a3::a7] = 0x04;
		self::$c[a3::a8] = 0x05;
		self::$c[a3::a9] = 0x06;
		self::$c[a3::aa] = 0x07;
		self::$c[a3::ab] = 0x08;
		self::$c[a3::ac] = 0x09;
		self::$c[a3::ad] = 0x0B;
		self::$c[a3::ae] = 0x0C;
		self::$c[a3::af] = 0x0E;
		self::$c[a3::ag] = 0x0F;
		self::$c[a3::ah] = 0x10;
		self::$c[a3::ai] = 0x11;
		self::$c[a3::aj] = 0x12;
		self::$c[a3::ak] = 0x13;
		self::$c[a3::al] = 0x14;
		self::$c[a3::am] = 0x15;
		self::$c[a3::an] = 0x16;
		self::$c[a3::ao] = 0x17;
		self::$c[a3::ap] = 0x18;
		self::$c[a3::aq] = 0x1A;
		self::$c[a3::ar] = 0x1B;
		self::$c[a3::at] = 0x1C;
		self::$c[a3::au] = 0x1D;
		self::$c[a3::av] = 0x26;
		self::$c[a3::aw] = 0x20;
		self::$c[a3::ax] = 0x27;
		self::$c[a3::ay] = 0x23;
		self::$c[a3::az] = 0x24;
		self::$c[a3::b0] = 0x25;
		self::$e = array_fill(0, 255, -1);
		self::$e[self::g] = 0x01;
		self::$e[self::h] = 0x02;
		self::$e[self::i] = 0x03;
		self::$e[b1::b2] = 0x04;
		self::$e[b1::b3] = 0x05;
		self::$e[b1::b4] = 0x06;
		self::$e[b1::b5] = 0x07;
		self::$e[b1::b6] = 0x08;
		self::$e[33] = 0x09;
		self::$e[self::f] = 0x0B;
		self::$d = array_fill(0, 255, -1);
		for ($i = 0; $i <= 128; $i++) {
			$e = self::b7($i);
			if ($e != -1) {
				self::$d[$e] = $i;
			}
		}
	}
	public static function b8($b9)
	{
		$ba = array_merge(unpack('C*', $b9));
		$bb = 0;
		for ($bc = 0; $bc < count($ba); $bc++) {
			$bd = self::b7($ba[$bc]);
			if ($bd != -1) {
				$bb++;
			}
		}
		if ($bb == 0) {
			return call_user_func_array("pack", array_merge(array("C*"), $ba));
		}
		$be = array_fill(0, count($ba) + $bb, 0);
		for ($bc = 0, $bf = 0; $bc < count($ba); $bc++, $bf++) {
			$bd = self::b7($ba[$bc]);
			if ($bd != -1) {
				$be[$bf] = self::i;
				$be[$bf + 1] = $bd;
				$bf++;
			} else {
				$be[$bf] = $ba[$bc];
			}
		}
		return call_user_func_array("pack", array_merge(array("C*"), $be));
	}
    public static function bg($b9) {
		$ba = array_merge(unpack('C*', $b9));
		$bb = 0;
        if (count($ba) == 0) {
            return $b9;
        }
		for ($bc = 0; $bc < count($ba); $bc++) {
			if ($ba[$bc] == self::i) {
				$bb++;
			}
		}
		$be = array_fill(0, count($ba) - $bb, 0);
		for ($bc = 0, $bf = 0; $bc < count($ba); $bc++, $bf++) {
			$bh = $ba[$bc];
			if ($bh == self::i) {
				if ($bc + 1 < count($ba)) {
					$be[$bf] = self::bi($ba[$bc + 1]);
					if ($be[$bf] == -1) {
						throw new \InvalidArgumentException();
					}
					$bc++;
				} else {
					throw new \InvalidArgumentException();
				}
			} else {
				$be[$bf] = $bh;
			}
		}
		return call_user_func_array("pack", array_merge(array("C*"), $be));
	}
	public static function bj($b9, $bk, $bl) {
		$bm = null;
		$bn = strpos($b9, chr(self::bo($bk)));
		$bp = strpos($b9, chr(self::h), $bn);
		if ($bn !== false && $bp !== false) {
			$bq = substr($b9, $bn + 1, $bp - ($bn + 1));
			switch($bl) {
				case br::bs:
					$bm = $bq;
					break;
				case br::bt:
					$bm = $bq;
					break;
				case br::bu:
					$bm = $bq;
					break;
				case br::bv:
					$bm = self::bw($bq);
					break;
			}
		}
		return $bm;
	}
	public static function bw($bx) {
		$b9 = array_merge(unpack("C*", $bx));
		$be = 0;
		$by = -1;
		$bz = 0;
		$c0;
		$bh;
		$c1 = count($b9);
		$c2 = 0;
		if ($c1 == 1) {
			return $b9[0];
		} else if ($c1 == 2 && $b9[$c2] == self::i) {
			$bh = self::bi($b9[$c2 + 1]);
			if ($bh != -1) {
				return $bh;
			} else {
				throw new \InvalidArgumentException();
			}
		}
		for (; $c1 > 0; $c1--) {
			$bh = $b9[$c2];
			$c2++;
			if ($bh == self::i) {
				if ($c1 - 1 < 0) {
					throw new \InvalidArgumentException();
				}
				$c1--;
				$bh = $b9[$c2];
				$c2++;
				$c0 = self::bi($bh);
				if ($c0 == -1) {
					throw new \InvalidArgumentException();
				}
			} else {
				$c0 = $bh;
			}
			if ($by > 0) {
				$bz |= $c0 >> $by;
				$be = $be << 8 | ($bz >= 0 ? $bz : $bz + 256);
				$bz = ($c0 << (8 - $by));
			} else {
				$bz = ($c0 << - $by);
			}
			$by = ($by + 7) % 8;
		}
		return $be;
	}
	public static function c3($bz) {
		if (($bz & 0xFFFFFF80) == 0) {
			$i = self::b7($bz);
			if ($i == -1) {
				return pack('C*', $bz);
			} else {
				return pack('C*', self::i, $i);
			}
		}
		$c4 = 0;
		if (($bz & 0xFF000000) != 0) {
			$c4 = 24;
		} else if (($bz & 0x00FF0000) != 0) {
			$c4 = 16;
		} else {
			$c4 = 8;
		}
		$be = array_fill(0, 10, 0);
		$c5 = 0;
		$c6 = 0;
		while ($c4 >= 0) {
			$b = (($bz >> $c4) & 0xFF);
			$c6++;
			$be[$c5] |= ($b >= 0 ? $b : $b + 256) >> $c6;
			$bd = self::b7($be[$c5]);
			if ($bd != -1) {
				$be[$c5] = self::i;
				$be[$c5 + 1] = $bd;
				$c5++;
			}
			$c5++;
			$be[$c5] |= ($b << (7 - $c6)) & 0x7F;
			$c4 -= 8;
		}
		$bd = self::b7($be[$c5]);
		if ($bd != -1) {
			$be[$c5] = self::i;
			$be[$c5 + 1] = $bd;
			$c5++;
		}
		$c5++;
		if ($c5 < count($be)) {
			$be = array_slice($be, 0, $c5);
		}
		return call_user_func_array("pack", array_merge(array("C*"), $be));
	}
	public static function bi($b) {
		return $b >= 0 ? self::$d[$b] : -1;
	}
	public static function b7($b) {
		return $b >= 0 ? self::$e[$b] : -1;
	}
	public static function bo($h) {
		return self::$c[$h];
	}
	public static function c7($o) {
		return self::$b[$o];
	}
}
class k {
	const l = 0;
	const m = 1;
	const n = 2;
	const o = 3;
	const p = 4;
	const q = 5;
	const r = 6;
	const s = 7;
	const a0 = 8;
	const t = 9;
	const u = 10;
	const v = 11;
	const w = 12;
	const x = 13;
	const z = 14;
	const y = 15;
	const a1 = 16;
	const a2 = 17;
}
class a3 {
	const a4 = 0;
	const a5 = 1;
	const a6 = 2;
	const a7 = 3;
	const a8 = 4;
	const a9 = 5;
	const aa = 6;
	const ab = 7;
	const ac = 8;
	const ad = 9;
	const ae = 10;
	const af = 11;
	const ag = 12;
	const aj = 13;
	const ak = 14;
	const al = 15;
	const am = 16;
	const an = 17;
	const ao = 18;
	const ap = 19;
	const aq = 20;
	const ar = 21;
	const at = 22;
	const au = 23;
	const av = 24;
	const aw = 25;
	const ax = 26;
	const ay = 27;
	const az = 28;
	const b0 = 29;
	const ah = 30;
	const ai = 31;
}
class br {
	const bs = 0;
	const bt = 1;
	const bu = 2;
	const bv = 3;
}
class b1 {
	const b2 = 0x00;
	const b5 = 0x22;
	const b3 = 0x0A;
	const b4 = 0x0D;
	const b6 = 0x5C;
}
a::j();
class c8
{
	const c9 = '/^\/([^\/*]+\/)*([^\/*])+$/';
	public static function ca($bq)
	{
		return preg_match(self::c9 , $bq);
	}
	public static function cb($b9) {
		$cc = array();
		$c2 = 0;
		$cd = ord($b9[$c2]);
		$c2++;
		while(true) {
			$bm = ord($b9[$c2]);
			$c2++;
			$bc = strpos($b9, chr(a::h), $c2);
			if ($bc === false) {
				break;
			}
			$ba = substr($b9, $c2, ($bc - $c2)); 
			if ($bm == a::bo(a3::am)) {
				$cc['workgroup'] = a::bw($ba);
			} else if ($bm == a::bo(a3::a9)) {
				$cc['session'] = a::bw($ba);
			} else if ($bm == a::bo(a3::al)) {
				$cc['reason'] = $ba;
			} else if ($bm == a::bo(a3::ad)) {
				$cc['error'] = $ba;
			}
			$c2 = $bc + 1;
			if ($c2 >= strlen($b9)) {
				break;
			}
		}
		return $cc;
	}
}
class ce
{
	private $cf = null;
	private $cg = 1000;
	private $ch = null;
	private $ci = null;
	private $cj = null;
	private $ck = -1;
	private $cl = -1;
	public function __construct($ci, $cj, $cg)
	{
		$this->ci = $ci;
		$this->cj = $cj;
		$this->cg = $cg;
		$this->cm();
	}
	public function cn($co)
	{
		$cp = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
		if (is_null($co)) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_NULL);
		}
		if (!($co instanceof MigratoryDataMessage)) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_INVALID);
		}
		$cq = $co->getSubject();
		$cr = $co->getContent();
		if (is_null($cq) || strlen($cq) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_SUBJECT, "subject is empty");
		}
		if (is_null($cr) || strlen($cr) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_NULL, "content of the message is null");
		}
		if ($this->ck == -1 || $this->cl == -1) {
			if (!is_null($this->cf)) {
				curl_close($this->cf);
				$this->cf = null;
			}
			$this->cm();
		}
		$b9 = chr(a::c7(k::y));
		$b9 .= $this->cs(a::bo(a3::ak), a::b8($this->cj));
		$b9 .= $this->cs(a::bo(a3::a8), a::c3(4));
		$b9 .= $this->cs(a::bo(a3::az), a::c3(4));
		$b9 .= $this->cs(a::bo(a3::a4), a::b8($cq));
		$b9 .= $this->cs(a::bo(a3::a5), a::b8($cr));
		$ct = $co->getFields();
		if (is_array($ct) ) {
			foreach ($ct as $cu) {
				if ($cu instanceof MigratoryDataField) {
					$cv = $cu->getName();
					$cw = $cu->getValue();
					if (is_null($cv) || strlen($cv) == 0) {
						throw new MigratoryDataException(MigratoryDataException::E_MSG_FIELD_INVALID, "field name is empty");
					}
					if (is_null($cw) || strlen($cw) == 0) {
						throw new MigratoryDataException(MigratoryDataException::E_MSG_FIELD_INVALID, "field value is empty");
					}
					$b9 .= $this->cs(a::bo(a3::ar), a::b8($cv));
					$b9 .= $this->cs(a::bo(a3::at), a::b8($cw));
				} else {
					throw new MigratoryDataException(MigratoryDataException::E_MSG_FIELD_INVALID);                        
				}
			}
		} else {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_INVALID);
		}
		$cx = "c";
		if ($cx != null && strlen($cx) > 0) {
			$b9 .= $this->cs(a::bo(a3::ah), a::b8($cx));
		}
		$b9 .= $this->cs(a::bo(a3::a9), a::c3($this->ck));
		$b9 .= $this->cs(a::bo(a3::am), a::c3($this->cl));
		$b9 .= chr(a::g);
		curl_setopt($this->cf, CURLOPT_HTTPHEADER, array('Expect:', 'Connection: Keep-Alive'));
		curl_setopt($this->cf, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->cf, CURLOPT_POST, 1);
		curl_setopt($this->cf, CURLOPT_HEADER, false);
		curl_setopt($this->cf, CURLOPT_POSTFIELDS, $b9);
		curl_setopt($this->cf, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->cf, CURLOPT_CONNECTTIMEOUT_MS, $this->cg);
		curl_setopt($this->cf, CURLOPT_TIMEOUT, 4);
		$cy = curl_exec($this->cf);
		if ($cy == false) {
			$this->ck = -1;
			$this->cl = -1;
			return $cp;
		} else {
			$headers = c8::cb($cy);		
			if (array_key_exists('reason', $headers)) {
				$reason = $headers['reason'];
				if ("OK" == $reason) {
					$cp  = MigratoryDataClient::NOTIFY_PUBLISH_OK;
				} else if ("NOT_SUBSCRIBED" == $reason) {
					$cp = MigratoryDataClient::NOTIFY_PUBLISH_NO_SUBSCRIBER;
				} else if ("FAILED" == $reason) {
					$cp = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
				} else if ("DENY" == $reason) {
					$cp = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
				} else {
					$cp = MigratoryDataClient::NOTIFY_PUBLISH_TIMEOUT;
				}
				if (array_key_exists('error', $headers) && $headers['error'] == "session_lost") {
					$this->ck = -1;
					$this->cl = -1;
				}
			} else {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, "Got publish response: " . $cy);
			}
		}
		return $cp;
	}
	private function cm($ch = null) {
		$exceptions = array();
		if (is_null($ch)) {
			$cz = $this->ci;
			$fail = true;
			shuffle($cz);
			foreach ($cz as $d0) {
				try {
					$this->cm($d0);
					$fail = false;
					$this->ch = $d0;
					break;
				} catch (MigratoryDataException $e) {
					$exceptions[] = $e;
				}
			}
			if ($fail == true) {
				if (is_null($this->ch)) {
					throw new MigratoryDataException(MigratoryDataException::E_CLUSTER_MEMBERS_CONNECTION_FAILED, "", $exceptions);
				} else {
					return MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
				}
			}
		} else {
			$this->cf = curl_init($ch);
			if (empty($this->cf)) {
				$error = curl_error($this->cf);
				curl_close($this->cf);
				$this->cf = null;
				throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, $ch . ', curl_error=' . $error);
			}
			$b9 = chr(a::c7(k::l));
			$b9 .= $this->cs(a::bo(a3::ak), a::b8($this->cj));
			$b9 .= $this->cs(a::bo(a3::a8), a::c3(4));
			$b9 .= $this->cs(a::bo(a3::az), a::c3(4));
			$b9 .= $this->cs(a::bo(a3::a4), a::b8(''));
			$b9 .= chr(a::g);
			curl_setopt($this->cf, CURLOPT_HTTPHEADER, array('Expect:', 'Connection: Keep-Alive'));
			curl_setopt($this->cf, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($this->cf, CURLOPT_POST, 1);
			curl_setopt($this->cf, CURLOPT_HEADER, false);
			curl_setopt($this->cf, CURLOPT_POSTFIELDS, $b9);
			curl_setopt($this->cf, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($this->cf, CURLOPT_CONNECTTIMEOUT_MS, $this->cg);
			$cy = curl_exec($this->cf);
			if (empty($cy)) {
				$error = curl_error($this->cf);
				curl_close($this->cf);
				$this->cf = null;
				throw new MigratoryDataException(MigratoryDataException::E_CONNECTION_FAILED, $ch . ', curl_error=' . $error);
			} else {
				$headers = c8::cb($cy);		
				if (array_key_exists('session', $headers) && array_key_exists('workgroup', $headers)) {
					$this->ck = $headers['session'];
					$this->cl = $headers['workgroup'];
				} else {
					curl_close($this->cf);
					$this->cf = null;
					throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, $ch . ", Got connect response: " . $cy);
				}
			}
		}
	}
	private function cs($bm, $b9) {
		$be = '';
		$be .= chr($bm);
		$be .= $b9;
		$be .= chr(a::h);
		return $be;
	}
}
class MigratoryDataException extends \Exception
{
	const E_INVALID_SUBJECT = 1;
	const E_TRANSPORT_INIT_FAILED = 2;
	const E_CONNECTION_FAILED = 3;
	const E_MSG_NULL = 4;
    const E_MSG_INVALID = 5;
    const E_MSG_FIELD_INVALID = 6;
	const E_CLUSTER_MEMBERS_CONNECTION_FAILED = 7; 
	const E_INVALID_URL_LIST = 8;
	const E_INVALID_URL = 9;
	const E_INVALID_PROTOCOL = 10;
	const E_ENTITLEMENT_TOKEN = 11;
	protected $d1 = array();
	protected $d2 = "";
	protected $code = -1;
	protected $message = "";
	public function getCause()
	{
		return $this->d2;
	}
	public function getDetail()
	{
		return $this->message;
	}
	public function getExceptions() {
		return $this->d1;
	}
	public function __construct($code, $cause = "", $exceptions = array())
	{
		$this->code = $code;
		$this->d2 = $cause;
		$this->d1 = $exceptions;
		$this->message = $this->getErrorInfo($code);
	}
	private function getErrorInfo($errorCode)
	{
		$ret = "";
		switch ($errorCode)
		{
			case self::E_INVALID_SUBJECT:
				$ret = "Invalid subject syntax";
				break;
			case self::E_TRANSPORT_INIT_FAILED:
				$ret = "Transport initialization failed";
				break;
			case self::E_CONNECTION_FAILED:
				$ret = "Connection failure";
				break;
			case self::E_MSG_NULL:
			    $ret = "Null message";
			    break;
			case self::E_MSG_INVALID:
			    $ret = "Invalid message";
			    break;
			case self::E_MSG_FIELD_INVALID:
			    $ret = "Invalid field";
			    break;
			case self::E_CLUSTER_MEMBERS_CONNECTION_FAILED:
			    $ret = "Failed to connect to all MigratoryData servers in the cluster";
			    break;
			case self::E_INVALID_URL_LIST:
			    $ret = "The list of MigratoryData servers is empty";
			    break;
			case self::E_INVALID_URL:
				$ret = "Invalid URL";
				break;
			case self::E_INVALID_PROTOCOL:
				$ret = "Invalid protocol";
				break;
			case self::E_ENTITLEMENT_TOKEN:
				$ret = "The entitlement token is not defined";
				break;
			default:
				$ret = "Unknown";
				break;
		}
		return $ret;
	}
}
class MigratoryDataField
{
	private $d3 = "";
	private $d4 = "";
	public function __construct($d3, $d4)
	{		
    	$this->d3 = $d3;
		$this->d4 = $d4;
	}
	public function getName()
	{
		return $this->d3;
	}
	public function getValue()
	{
		return $this->d4;
	}
}
class MigratoryDataMessage
{
	private $cq = "";
	private $cr = "";
	private $ct = array();
	public function __construct($cq, $cr, $ct = array())
	{		
		if (c8::ca($cq)){
			$this->cq = $cq;
			$this->cr = $cr;
			$this->ct = $ct;
			}
		else{
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_SUBJECT, $cq);
		}
	}
	public function getSubject()
	{
		return $this->cq;
	}
	public function getContent()
	{
		return $this->cr;
	}
    public function getFields() {
        return $this->ct;
    }
}
class MigratoryDataClient
{
    const NOTIFY_PUBLISH_OK = 'NOTIFY_PUBLISH_OK';
	const NOTIFY_PUBLISH_FAILED = 'NOTIFY_PUBLISH_FAILED';
    const NOTIFY_PUBLISH_DENIED = 'NOTIFY_PUBLISH_DENIED';
	const NOTIFY_PUBLISH_NO_SUBSCRIBER = 'NOTIFY_PUBLISH_NO_SUBSCRIBER';
	const NOTIFY_PUBLISH_TIMEOUT = 'NOTIFY_PUBLISH_TIMEOUT';
	private $d5 = null;
	private $d6 = null;
	private $cg = 1000;
	public function __construct()
	{
	}
	public function setEntitlementToken($d5)
	{
		$this->d5 = $d5;
	}
	public function setServers($ci) 
	{
		if (!isset($this->d5) || trim($this->d5) === '') {
			throw  new MigratoryDataException(MigratoryDataException::E_ENTITLEMENT_TOKEN);
		}
        if (!is_array($ci) || count($ci) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL_LIST);
        }
		foreach ($ci as $addr) {
			if (!isset($addr) || trim($addr) === '') {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $addr);
			}
		}
        try {
        	$this->d6 = new ce($ci, $this->d5, $this->cg);
        } catch (MigratoryDataException $e) {
        	throw new MigratoryDataException(MigratoryDataException::E_CLUSTER_MEMBERS_CONNECTION_FAILED, "", $e->getExceptions());
        }
    }
	public function publish($co)
	{
		if ($this->d6 == null) {
			throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED);
		}
		$response = $this->d6->cn($co);
		return $response;		
	}
	public function setConnectionTimeout($cg) {
		$this->cg = $cg;
	}
}

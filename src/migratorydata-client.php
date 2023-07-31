<?php
namespace MigratoryData\Client;
class a
{
	private $b = "";
	private $c = -1;
	private $d = -1;
	private $e = -1;
	private $f = -1;
	private $g = -1;
	private $h = "";
	private $i = -1;
	public function __construct()
	{
	}
	public function j($b)
	{
		$this->b .= $b;
	}
	public function k($b)
	{
		$this->h .= $b;
	}
	public function l()
	{
		$this->i = ($this->i == 3) ? 0 : ($this->i + 1);
		return $this->h[$this->i];
	}
	public function m()
	{
		return $this->g;
	}
	public function g($g)
	{
		$this->g = $g;
	}
	public function n($o, $p)
	{
		$this->b[$o] = $p;
	}
	public function q($o)
	{
		return $this->b[$o];
	}
	public function r()
	{
		$this->c = strlen($this->b);
	}
	public function s()
	{
		$this->d = strlen($this->b);
	}
	public function t()
	{
		$this->e = strlen($this->b);
	}
	public function u()
	{
		$this->f = strlen($this->b);
	}
	public function v()
	{
		return $this->c;
	}
	public function w()
	{
		return $this->d;
	}
	public function x()
	{
		return $this->e;
	}
	public function y()
	{
		return $this->f;
	}
	public function z($__data)
	{
		$this->b = $__data;
	}
	public function a0()
	{
		return $this->b;
	}
	public function a1()
	{
		$this->g = 0;
	}
    public function a2()
    {
        if($this->g === 0){
            return $this->b;
        } else {
            return substr($this->b, $this->g);
        }
    }
	public function a3()
	{
		return strlen($this->b);
	}
}
class a4
{
	private $a5 = 80;
	private $a6 = 443;
	private $a7 = false;
	private $a8;
	private $a9;
	private $aa;
	public function __construct($ab, $ac)
	{
		$this->aa = $ab;
		$ad = strrpos($ab, '/');
		$ae = $ad === false ? $ab : substr($ab, $ad + 1);
		$af = strrpos($ae, ':');
		if ($af !== false) {
			$this->a8 = substr($ae, 0, $af);
			$this->a9 = intval(substr($ae, $af + 1));
			if ($this->a9 < 0 || $this->a9 > 65535) {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $ab . " - invalid port number");
			}
			if ($this->a8 === "*") {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $ab . " - wildcard address (*) cannot be used to define a cluster member");
			}
		} else {
			$this->a8 = $ae;
			if ($ac === false) {
				$this->a9 = $this->a5;
			} else {
				$this->a9 = $this->a6;
			}
			$this->a7 = true;
		}
	}
	public function ag($ac)
	{
		if ($this->a7 === true) {
			if ($ac === true) {
				$this->a9 = $this->a6;
			} else {
				$this->a9 = $this->a5;
			}
		}
	}
	public function ah()
	{
		return $this->a8;
	}
	public function ai()
	{
		return $this->a9;
	}
	public function aj()
	{
		return $this->aa;
	}
}
class ak
{
	private $al = array();
	public function __construct($am, $ac)
	{
		foreach ($am as $an) {
			$this->al[] = new a4($an, $ac);
		}
	}
	public function ao()
	{
		$al = $this->al;
		shuffle($al);
		return $al;
	}
	public function ap($ac)
	{
		foreach ($this->al as $aq) {
			$aq->ag($ac);
		}
	}
}
class ar
{
	private $at;
	private $au;
	public function __construct($at, $au)
	{
		$this->at = $at;
		$this->au = $au;
	}
	public function av()
	{
		return $this->at;
	}
	public function aw()
	{
		return $this->au;
	}
}
class ax
{
	public static function ay($az)
	{
		$b0 = ax::b1($az->a0());
		$o = $b0->av();
		if ($az->a3() < $b0->aw()) {
			$o = -1;
		}
		if ($o === -1) {
			return $o;
		}
		while (ord($az->q($o)) === b2::b3) {
			$o++;
		}
		return $o;
	}
	public static function b1($b)
	{
		$b4 = new ar(-1, -1);
		$o = 0;
		$b5 = 2;
		$b6 = 0;
		$b7 = 0;
		$b8 = strlen($b) - $o;
		if ($b8 < $b5) {
			return $b4;
		}
		$b9 = b2::ba($b[$o]);
		$bb = ($b9 >> 7) & 0x01;
		$bc = $b9 & 0x40;
		$bd = $b9 & 0x20;
		$be = $b9 & 0x10;
		if ($bb !== 1 || $bc !== 0 || $bd !== 0 || $be !== 0) {
			return $b4;
		}
		$o++;
		$b9 = b2::ba($b[$o]);
		$bf = $b9 & 0x7F;
		if ($bf < 126) {
			$b7 = 0;
			$b6 = $bf;
		} else if ($bf === 126) {
			$b7 = 2;
			if ($b8 < $b5 + $b7) {
				return $b4;
			}
			$bg = "";
			for ($bh = $o + 1; $bh <= $o + $b7; $bh++) {
				$bg .= $b[$bh];
			}
			$b6 = ax::bi($bg);
			$o += $b7;
		} else {
			$b7 = 8;
			if ($b8 < $b5 + $b7) {
				return $b4;
			}
			$bg = "";
			for ($bh = $o + 1; $bh <= $o + $b7; $bh++) {
				$bg .= $b[$bh];
			}
			$b6 = ax::bi($bg);
			$o += $b7;
		}
		if ($b8 < ($b5 + $b7 + $b6)) {
			return $b4;
		}
		$o += 1;
		return new ar($o, $o + $b6);
	}
	private static function bi($b)
	{
		if (strlen($b) === 2) {
			return (ord($b[0] & chr(0xFF)) << 8) | ord($b[1] & chr(0xFF));
		} else {
			$bj = ord($b[4] & chr(0x7F)) << 24;
			$bk = ord($b[5] & chr(0xFF)) << 16;
			$bl = ord($b[6] & chr(0xFF)) << 8;
			$bm = ord($b[7] & chr(0xFF));
			$bn = $bj | $bk | $bl | $bm;
			return $bn;
		}
	}
}
interface bo
{
	public function bp($a8, $bq);
	public function br($az);
	public function bs($a8, $bt, $bq);
}
class bu implements bo
{
	private $bv = "GET /WebSocketConnection HTTP/1.1";
	private $bw = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $bx = "Host: ";
	private $by = "Origin: ";
	private $bz = "Upgrade: websocket";
	private $c0 = "Sec-WebSocket-Key: ";
	private $c1 = "Sec-WebSocket-Version: 13";
	private $c2 = "Sec-WebSocket-Protocol: pushv1";
	private $c3 = "Connection: Upgrade";
	private $c4 = "\r\n";
	private $c5 = 10;
	private $c6 = -128;
	private $c7 = -128;
	private $c8 = 0x02;
	public function __construct()
	{
	}
	public function bp($a8, $bq)
	{
		$az = new a();
		for ($bh = 0; $bh < $this->c5; $bh++) {
			$az->j(chr(0x00));
		}
		for ($bh = 0; $bh < 4; $bh++) {
			$c9 = chr(rand(0, 100));
			$az->j($c9);
			$az->k($c9);
		}
		$az->t();
		return $az;
	}
	public function br($az)
	{
		$bb = chr($this->c6) | chr($this->c8);
		$az->u();
		$ca = $az->y() - $az->x();
		$cb = $this->cc($ca);
		$cd = $this->ce($ca, $cb);
		$cf = 0;
		if ($cb === 1) {
			$cf = 8;
			$az->n($cf, $bb);
			$az->n($cf + 1, $cd[0] | chr($this->c7));
		} else if ($cb === 2) {
			$cf = 6;
			$az->n($cf, $bb);
			$az->n($cf + 1, chr(126) | chr($this->c7));
			for ($bh = 0; $bh <= 1; $bh++) {
				$az->n($cf + 2 + $bh, $cd[$bh]);
			}
		} else {
			$az->n($cf, $bb);
			$az->n($cf + 1, chr(127) | chr($this->c7));
			for ($bh = 0; $bh <= 7; $bh++) {
				$az->n($cf + 2 + $bh, $cd[$bh]);
			}
		}
		$az->g($cf);
	}
	public function bs($a8, $bt, $bq)
	{
		$az = new a();
		if (!$bt) {
			$az->j($this->bv);
		} else {
			$az->j($this->bw);
		}
		$az->j($this->c4);
		$az->j($this->by);
		$az->j("http://" . $a8);
		$az->j($this->c4);
		$az->j($this->bx);
		$az->j($a8);
		$az->j($this->c4);
		$az->j($this->bz);
		$az->j($this->c4);
		$az->j($this->c3);
		$az->j($this->c4);
		foreach($bq as $name => $value) {
			$az->j($name);
			$az->j(": ");
			$az->j($value);
			$az->j($this->c4);
		}
		$az->j($this->c0);
		$az->j($this->cg());
		$az->j($this->c4);
		$az->j($this->c1);
		$az->j($this->c4);
		$az->j($this->c2);
		$az->j($this->c4);
		$az->j($this->c4);
		return $az;
	}
	private function cc($ch)
	{
		if ($ch <= 125) {
			return 1;
		} else if ($ch <= 65535) {
			return 2;
		}
		return 8;
	}
	private function ce($p, $cb)
	{
		$az = "";
		$ci = 8 * $cb - 8;
		for ($bh = 0; $bh < $cb; $bh++) {
			$cj = $this->ck($p, $ci - 8 * $bh);
			$cl = $cj - (256 * intval($cj / 256));
			$az .= chr($cl);
		}
		return $az;
	}
	private function ck($cm, $cn)
	{
		return ($cm % 0x100000000) >> $cn;
	}
	private function cg() 
	{
		$key = '';
        for ($i = 0; $i < 16; $i++) {
            $key .= chr(rand(33, 126));
        }
        return base64_encode($key);
	}
}
class co implements bo
{
	private $cp = "POST / HTTP/1.1";
	private $bx = "Host: ";
	private $cq = "Content-Length: ";
	private $cr = "00000";
	private $c4 = "\r\n";
	public function __construct()
	{
	}
	public function bp($a8, $bq)
	{
		$az = new a();
		$az->j($this->cp);
		$az->j($this->c4);
		$az->j($this->bx);
		$az->j(b2::cs($a8));
		$az->j($this->c4);
		foreach($bq as $name => $value) {
			$az->j($name);
			$az->j(": ");
			$az->j($value);
			$az->j($this->c4);
		}
		$az->j($this->cq);
		$az->r();
		$az->j($this->cr);
		$az->j($this->c4);
		$az->j($this->c4);
		$az->s();
		return $az;
	}
	public function br($az)
	{
		$o = $az->a3();
		$ct = strval($o - $az->w());
		if (strlen($ct) <= strlen($this->cr)) {
			$cu = 0;
			for ($bh = strlen($this->cr) - strlen($ct); $bh < strlen($this->cr); $bh++) {
				$az->n($az->v() + $bh, $ct[$cu]);
				$cu++;
			}
		} else {
			$cv = substr($az->a0(), 0, $az->v());
			$cv .= $ct;
			$cv .= substr($az->a0(), $az->v() + strlen($this->cr));
			$az->z($cv);
		}
		$az->a1();
	}
	public function bs($a8, $bt, $bq)
	{
		return "";
	}
}
class cw
{
	private $cx = cy::cz;
	private $d0 = MigratoryDataClient::TRANSPORT_WEBSOCKET;
	public function __construct()
	{
	}
	public function d1()
	{
		$this->d0 = MigratoryDataClient::TRANSPORT_HTTP;
		$this->cx = cy::d2;
	}
	public function d3($az, $d4, $d5, $d6)
	{
		if ($this->d0 == MigratoryDataClient::TRANSPORT_HTTP) {
			$az->j(chr(b2::d7(d8::d9)));
		} else {
			$az->j(chr(b2::d7(d8::d9)) ^ $az->l());
		}
		$az->j($this->da(b2::db(dc::dd), b2::cs($d4), $az));
		$az->j($this->da(b2::db(dc::cx), b2::de($this->cx), $az));
		$az->j($this->da(b2::db(dc::df), b2::de($d5), $az));
		$az->j($this->da(b2::db(dc::dg), b2::de($d6), $az));
		if ($this->d0 == MigratoryDataClient::TRANSPORT_HTTP) {
			$az->j(chr(b2::b3));
		} else {
			$az->j(chr(b2::b3) ^ $az->l());
		}
	}
	public function dh($az, $di, $dj)
	{
		if ($this->d0 == MigratoryDataClient::TRANSPORT_HTTP) {
			$az->j(chr(b2::d7(d8::dk)));
		} else {
			$az->j(chr(b2::d7(d8::dk)) ^ $az->l());
		}
		$az->j($this->da(b2::db(dc::dl), b2::cs($di->getSubject()), $az));
        if ($di->isCompressed()) {
            $dm = $this->dn($di->getContent());
            if (strlen($dm) < strlen($di->getContent())) {
                $az->j($this->da(b2::db(dc::dp), b2::cs($dm), $az));
            } else {
                $az->j($this->da(b2::db(dc::dp), b2::cs($di->getContent()), $az));
                $di->setCompressed(false);
            }
        } else {
            $az->j($this->da(b2::db(dc::dp), b2::cs($di->getContent()), $az));
        }
		$dq = "c";
		if ($dq != null && strlen($dq) > 0) {
			$az->j($this->da(b2::db(dc::dr), b2::cs($dq), $az));
		}
		$az->j($this->da(b2::db(dc::ds), b2::de($dj), $az));
		if ($di->getQos() == QoS::GUARANTEED) {
			$az->j($this->da(b2::db(dc::dt), b2::de(QoS::GUARANTEED), $az));
		} else {
			$az->j($this->da(b2::db(dc::dt), b2::de(QoS::STANDARD), $az));
		}
		if ($di->isRetained() == true) {
			$az->j($this->da(b2::db(dc::du), b2::de(1), $az));
		} else {
			$az->j($this->da(b2::db(dc::du), b2::de(0), $az));
		}
        if ($di->isCompressed()) {
            $az->j($this->da(b2::db(dc::dv), b2::de(1), $az));
        }
		$az->j($this->da(b2::db(dc::cx), b2::de($this->cx), $az));
		if ($this->d0 == MigratoryDataClient::TRANSPORT_HTTP) {
			$az->j(chr(b2::b3));
		} else {
			$az->j(chr(b2::b3) ^ $az->l());
		}
	}
	private function da($dw, $b, $az)
	{
		$dx = '';
		if ($this->d0 == MigratoryDataClient::TRANSPORT_HTTP) {
			$dx .= chr($dw);
			$dx .= $b;
			$dx .= chr(b2::dy);
		} else {
			$dx .= chr($dw) ^ $az->l();
			for ($bh = 0; $bh < strlen($b); $bh++) {
				$dx .= $b[$bh] ^ $az->l();
			}
			$dx .= chr(b2::dy) ^ $az->l();
		}
		return $dx;
	}
    public function dn($dz)
    {
        $e0 = gzdeflate($dz);
        if ($e0 === false) {
            return $dz;
        }
        $e1 = base64_encode($e0);
        return $e1;
    }
}
class e2
{
	const e3 = 32768;
	private $e4;
	private $d0;
	private $e5;
	public function __construct($e4, $d0, $e6)
	{
		$this->e4 = $e4;
		$this->d0 = $d0;
		$this->e5 = $e6 / 1000;
	}
	public function e7()
	{
		$az = new a();
		$o = -1;
		$e8 = microtime(true);
		while ($o == -1) {
			$b = @fread($this->e4, e2::e3);
			if ($b === false) {
				return "";
			}
			if (strlen($b) == 0) {
				return "";
			}
			$az->j($b);
			if ($this->d0 === MigratoryDataClient::TRANSPORT_HTTP) {
				$o = e9::ea($az->a0());
			} else {
				$o = ax::ay($az);
				if ($o === -1 && (strpos($az->a0(), "Sec-WebSocket-Accept") !== false || strpos($az->a0(), "sec-websocket-accept") !== false)) {
					return $az;
				}
			}
			if ($o != -1 && b2::ba($az->q($o)) == b2::d7(d8::eb)) {
				$ec = 2;
				if ($this->d0 === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
					$ec++;
				}
				$ed = $az->a3();
				$az->z(substr($az->a0(), $o + $ec));
				if ($ed === $o + $ec) {
					$o = -1;
				}
			}
			$ee = (microtime(true) - $e8);
			if ($ee >= $this->e5 && $az->a3() === 0) {
				return "";
			}
		}
		$az->g($o);
		return $az;
	}
}
class ef
{
	private $e4;
	public function __construct($e4)
	{
		$this->e4 = $e4;
	}
	public function eg($b)
	{
		$eh = $b;
		$ei = strlen($b);
		while (true) {
			$ej = @fwrite($this->e4, $eh);
			if ($ej === false) {
				return false;
			}
			if ($ej < $ei) {
				$eh = substr($eh, $ej);
				$ei -= $ej;
			} else {
				break;
			}
		}
		return true;
	}
}
class b2
{
	public static $ek = array();
	public static $el = array();
	public static $em = array();
	public static $en = array();
	const eo = 0x19;
	const b3 = 0x7F;
	const dy = 0x1E;
	const ep = 0x1F;
	public static function eq()
	{
		self::$ek = array_fill(0, 128, -1);
		self::$ek[d8::er] = 0x01;
		self::$ek[d8::es] = 0x02;
		self::$ek[d8::et] = 0x03;
		self::$ek[d8::eb] = 0x04;
		self::$ek[d8::eu] = 0x05;
		self::$ek[d8::ev] = 0x06;
		self::$ek[d8::ew] = 0x08;
		self::$ek[d8::ex] = 0x09;
		self::$ek[d8::ey] = 0x0C;
		self::$ek[d8::dk] = 0x10;
		self::$ek[d8::ez] = 0x13;
		self::$ek[d8::d9] = 0x1A;
		self::$ek[d8::f0] = 0x07;
		self::$ek[d8::f1] = 0x0B;
		self::$el = array_fill(0, 128, -1);
		self::$el[dc::dl] = 0x01;
		self::$el[dc::dp] = 0x02;
		self::$el[dc::f2] = 0x03;
		self::$el[dc::f3] = 0x04;
		self::$el[dc::cx] = 0x05;
		self::$el[dc::ds] = 0x06;
		self::$el[dc::f4] = 0x07;
		self::$el[dc::f5] = 0x08;
		self::$el[dc::f6] = 0x09;
		self::$el[dc::f7] = 0x0C;
		self::$el[dc::f8] = 0x0E;
		self::$el[dc::f9] = 0x0F;
		self::$el[dc::dr] = 0x10;
		self::$el[dc::fa] = 0x11;
		self::$el[dc::fb] = 0x12;
		self::$el[dc::dd] = 0x13;
		self::$el[dc::fc] = 0x14;
		self::$el[dc::fd] = 0x15;
		self::$el[dc::fe] = 0x16;
		self::$el[dc::du] = 0x17;
		self::$el[dc::dt] = 0x18;
		self::$el[dc::ff] = 0x1A;
		self::$el[dc::fg] = 0x1B;
		self::$el[dc::fh] = 0x1C;
		self::$el[dc::fi] = 0x1D;
		self::$el[dc::fj] = 0x20;
		self::$el[dc::fk] = 0x27;
		self::$el[dc::fl] = 0x23;
		self::$el[dc::df] = 0x24;
		self::$el[dc::fm] = 0x25;
		self::$el[dc::dg] = 0x2D;
		self::$el[dc::fo] = 0x1D;
		self::$el[dc::dv] = 0x26;
		self::$el[dc::fp] = 0x0B;
		self::$en = array_fill(0, 255, -1);
		self::$en[self::b3] = 0x01;
		self::$en[self::dy] = 0x02;
		self::$en[self::ep] = 0x03;
		self::$en[fq::fr] = 0x04;
		self::$en[fq::fs] = 0x05;
		self::$en[fq::ft] = 0x06;
		self::$en[fq::fu] = 0x07;
		self::$en[fq::fv] = 0x08;
		self::$en[33] = 0x09;
		self::$en[self::eo] = 0x0B;
		self::$em = array_fill(0, 255, -1);
		for ($i = 0; $i <= 128; $i++) {
			$e = self::fw($i);
			if ($e != -1) {
				self::$em[$e] = $i;
			}
		}
	}
	public static function cs($b)
	{
		$fx = array_merge(unpack('C*', $b));
		$fy = 0;
		for ($bh = 0; $bh < count($fx); $bh++) {
			$fz = self::fw($fx[$bh]);
			if ($fz != -1) {
				$fy++;
			}
		}
		if ($fy == 0) {
			return call_user_func_array("pack", array_merge(array("C*"), $fx));
		}
		$dx = array_fill(0, count($fx) + $fy, 0);
		for ($bh = 0, $g0 = 0; $bh < count($fx); $bh++, $g0++) {
			$fz = self::fw($fx[$bh]);
			if ($fz != -1) {
				$dx[$g0] = self::ep;
				$dx[$g0 + 1] = $fz;
				$g0++;
			} else {
				$dx[$g0] = $fx[$bh];
			}
		}
		return call_user_func_array("pack", array_merge(array("C*"), $dx));
	}
	public static function g1($b)
	{
		$fx = array_merge(unpack('C*', $b));
		$fy = 0;
		if (count($fx) == 0) {
			return $b;
		}
		for ($bh = 0; $bh < count($fx); $bh++) {
			if ($fx[$bh] == self::ep) {
				$fy++;
			}
		}
		$dx = array_fill(0, count($fx) - $fy, 0);
		for ($bh = 0, $g0 = 0; $bh < count($fx); $bh++, $g0++) {
			$b9 = $fx[$bh];
			if ($b9 == self::ep) {
				if ($bh + 1 < count($fx)) {
					$dx[$g0] = self::g2($fx[$bh + 1]);
					if ($dx[$g0] == -1) {
						throw new \InvalidArgumentException();
					}
					$bh++;
				} else {
					throw new \InvalidArgumentException();
				}
			} else {
				$dx[$g0] = $b9;
			}
		}
		return call_user_func_array("pack", array_merge(array("C*"), $dx));
	}
	public static function g3($b, $g4, $g5)
	{
		$dw = null;
		$g6 = strpos($b, chr(self::db($g4)));
		$g7 = strpos($b, chr(self::dy), $g6);
		if ($g6 !== false && $g7 !== false) {
			$g8 = substr($b, $g6 + 1, $g7 - ($g6 + 1));
			switch ($g5) {
				case g9::ga:
					$dw = $g8;
					break;
				case g9::gb:
					$dw = $g8;
					break;
				case g9::gc:
					$dw = $g8;
					break;
				case g9::gd:
					$dw = self::ba($g8);
					break;
			}
		}
		return $dw;
	}
	public static function ba($ge)
	{
		$b = array_merge(unpack("C*", $ge));
		$dx = 0;
		$gf = -1;
		$cm = 0;
		$gg;
		$b9;
		$gh = count($b);
		$o = 0;
		if ($gh == 1) {
			return $b[0];
		} else if ($gh == 2 && $b[$o] == self::ep) {
			$b9 = self::g2($b[$o + 1]);
			if ($b9 != -1) {
				return $b9;
			} else {
				throw new \InvalidArgumentException();
			}
		}
		for (; $gh > 0; $gh--) {
			$b9 = $b[$o];
			$o++;
			if ($b9 == self::ep) {
				if ($gh - 1 < 0) {
					throw new \InvalidArgumentException();
				}
				$gh--;
				$b9 = $b[$o];
				$o++;
				$gg = self::g2($b9);
				if ($gg == -1) {
					throw new \InvalidArgumentException();
				}
			} else {
				$gg = $b9;
			}
			if ($gf > 0) {
				$cm |= $gg >> $gf;
				$dx = $dx << 8 | ($cm >= 0 ? $cm : $cm + 256);
				$cm = ($gg << (8 - $gf));
			} else {
				$cm = ($gg << -$gf);
			}
			$gf = ($gf + 7) % 8;
		}
		return $dx;
	}
	public static function de($cm)
	{
		if (($cm & 0xFFFFFF80) == 0) {
			$i = self::fw($cm);
			if ($i == -1) {
				return pack('C*', $cm);
			} else {
				return pack('C*', self::ep, $i);
			}
		}
		$gi = 0;
		if (($cm & 0xFF000000) != 0) {
			$gi = 24;
		} else if (($cm & 0x00FF0000) != 0) {
			$gi = 16;
		} else {
			$gi = 8;
		}
		$dx = array_fill(0, 10, 0);
		$gj = 0;
		$gk = 0;
		while ($gi >= 0) {
			$b = (($cm >> $gi) & 0xFF);
			$gk++;
			$dx[$gj] |= ($b >= 0 ? $b : $b + 256) >> $gk;
			$fz = self::fw($dx[$gj]);
			if ($fz != -1) {
				$dx[$gj] = self::ep;
				$dx[$gj + 1] = $fz;
				$gj++;
			}
			$gj++;
			$dx[$gj] |= ($b << (7 - $gk)) & 0x7F;
			$gi -= 8;
		}
		$fz = self::fw($dx[$gj]);
		if ($fz != -1) {
			$dx[$gj] = self::ep;
			$dx[$gj + 1] = $fz;
			$gj++;
		}
		$gj++;
		if ($gj < count($dx)) {
			$dx = array_slice($dx, 0, $gj);
		}
		return call_user_func_array("pack", array_merge(array("C*"), $dx));
	}
	public static function g2($b)
	{
		return $b >= 0 ? self::$em[$b] : -1;
	}
	public static function fw($b)
	{
		return $b >= 0 ? self::$en[$b] : -1;
	}
	public static function db($h)
	{
		return self::$el[$h];
	}
	public static function d7($o)
	{
		return self::$ek[$o];
	}
}
class d8
{
	const er = 0;
	const es = 1;
	const et = 2;
	const eb = 3;
	const eu = 4;
	const ev = 5;
	const ew = 6;
	const ex = 7;
	const ey = 8;
	const dk = 9;
	const ez = 10;
	const d9 = 11;
	const f0 = 12;
	const f1 = 13;
}
class dc
{
	const dl = 0;
	const dp = 1;
	const f2 = 2;
	const f3 = 3;
	const cx = 4;
	const ds = 5;
	const f4 = 6;
	const f5 = 7;
	const f6 = 8;
	const f7 = 9;
	const f8 = 10;
	const f9 = 11;
	const fb = 12;
	const dd = 13;
	const fc = 14;
	const fd = 15;
	const fe = 16;
	const du = 17;
	const dt = 18;
	const ff = 19;
	const fg = 20;
	const fh = 21;
	const fi = 22;
	const fj = 23;
	const fk = 24;
	const fl = 25;
	const df = 26;
	const fm = 27;
	const dr = 28;
	const fa = 29;
	const dg = 30;
	const fo = 31;
	const dv = 32;
	const fp = 33;
}
class g9
{
	const ga = 0;
	const gb = 1;
	const gc = 2;
	const gd = 3;
}
class fq
{
	const fr = 0x00;
	const fu = 0x22;
	const fs = 0x0A;
	const ft = 0x0D;
	const fv = 0x5C;
}
class cy
{
	const d2 = 4;
	const cz = 8;
}
class gl
{
	const gm = 0;
	const gn = 1;
	const go = 2;
	const gp = 3;
}
b2::eq();
class e9
{
	const gq = '/^\/([^\/]+\/)*([^\/]+|\*)$/';
	const gr = "\r\n\r\n";
	const cq = "Content-Length: ";
	public static function gs($g8)
	{
		return preg_match(self::gq, $g8);
	}
	public static function gt($az)
	{
		$gu = array();
		$o = $az->m();
		$gv = ord($az->q($o));
		$o++;
		while (true) {
			$dw = ord($az->q($o));
			$o++;
			$bh = strpos($az->a0(), chr(b2::dy), $o);
			if ($bh === false) {
				break;
			}
			$fx = substr($az->a0(), $o, ($bh - $o));
			if ($dw == b2::db(dc::ds)) {
				$gu['session'] = b2::ba($fx);
			} else if ($dw == b2::db(dc::fc)) {
				$gu['reason'] = $fx;
			} else if ($dw == b2::db(dc::fo)) {
                $gu['message_size'] = b2::ba($fx);
            } else if ($dw == b2::db(dc::fp)) {
				$gu['error'] = b2::ba($fx);
			}
			$o = $bh + 1;
			if ($o >= $az->a3()) {
				break;
			}
		}
		return $gu;
	}
	public static function ea($b)
	{
		$gw = b2::cs(e9::cq);
		$o = e9::gx($gw, $b);
		if ($o == -1) {
			return -1;
		}
		$o += strlen($gw);
		$gy = "\r";
		$gz = e9::h0($b, $o, strlen($b), $gy);
		if ($gz == -1) {
			return -1;
		}
		$h1 = substr($b, $o, $gz - $o);
		$h2 = intval($h1);
		$o = e9::gx(e9::gr, $b);
		if ($o == -1) {
			return $o;
		}
		$o += strlen(e9::gr);
		if (($o + $h2) > strlen($b)) {
			return -1;
		}
		return $o;
	}
	private static function h0($b, $at, $au, $h3)
	{
		for ($bh = $at; $bh < $au; $bh++) {
			if ($b[$bh] == $h3) {
				return $bh;
			}
		}
		return -1;
	}
	private static function gx($h4, $h5)
	{
		$h6 = strlen($h4);
		$cn = strlen($h5);
		$h7 = array_fill(0, $h6, 0);
		e9::h8($h4, $h6, $h7);
		$bh = 0;
		$g0 = 0;
		while ($bh < $cn) {
			if ($h4[$g0] == $h5[$bh]) {
				$g0++;
				$bh++;
			}
			if ($g0 == $h6) {
				return $bh - $g0;
			} else if ($bh < $cn && $h4[$g0] != $h5[$bh]) {
				if ($g0 != 0)
					$g0 = $h7[$g0 - 1];
				else
					$bh = $bh + 1;
			}
		}
		return -1;
	}
	private static function h8($h4, $h6, &$h7)
	{
		$gh = 0;
		$h7[0] = 0;
		$bh = 1;
		while ($bh < $h6) {
			if ($h4[$bh] == $h4[$gh]) {
				$gh++;
				$h7[$bh] = $gh;
				$bh++;
			} else {
				if ($gh != 0) {
					$gh = $h7[$gh - 1];
				} else {
					$h7[$bh] = 0;
					$bh++;
				}
			}
		}
	}
}
class Version
{
        //      6       h9   xx   h9 xxx
    // push version h9 API ID h9 API version
    // ex: for Java with API ID 00 and version 001 => 600001
    // ex: for C# with API ID 02 and version 006 => 602006
    // Java - 00
    // Javascript Legacy - 01
    // C# - 02
    // C++ - 03
    // iOS - 04
    // Python - 05
    // PHP Pub - 06
    // PHP React - 07
    // NodeJS - 08
    // Javascript-Browser - 09
    // Android - 10
	const VERSION = 6;
}
class ha
{
	private $hb = 3;
	private $dg = Version::VERSION;
	private $e6 = 1000;
	private $ac = false;
	private $a8 = null;
	private $hc = null;
	private $d4 = null;
	private $hd = null;
	private $he = null;
	private $d0 = null;
	private $e4 = null;
	private $hf = null;
	private $hg = null;
	private $dj = -1;
	private $hh = false;
	private $hi = null;
	private $bq = [];
	public function __construct()
	{
		$this->d0 = MigratoryDataClient::TRANSPORT_WEBSOCKET;
		$this->hd = new bu();
		$this->he = new cw();
	}
	public function hj($hk = null)
	{
		if (is_null($hk)) {
			$hl = array();
			$hm = true;
			foreach ($this->hc->ao() as $hn) {
				try {
					$this->hj($hn);
					$hm = false;
					break;
				} catch (MigratoryDataException $ho) {
					$hl[] = $ho;
				}
			}
			if ($hm == true) {
				throw new MigratoryDataException(MigratoryDataException::E_CLUSTER_MEMBERS_CONNECTION_FAILED, "", $hl);
			}
		} else {
			$this->a8 = $hk->ah();
			$this->hp($this->a8, $hk->ai());
			$this->hf = new e2($this->e4, $this->d0, $this->e6);
			$this->hg = new ef($this->e4);
			$this->hq();
			$this->hr($hk->aj());
			$this->hh = true;
		}
	}
	private function hp($a8, $a9)
	{
		if ($this->ac) {
			$hs = @stream_context_create();
			$ht = @stream_context_set_option($hs, 'ssl', 'allow_self_signed', true);
			if (!$ht) {
				throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "ssl socket creation");
			}
			$this->e4 = @stream_socket_client("tlsv1.2://" . $a8 . ":" . $a9, $hu, $hv,
				$this->e6 / 1000, STREAM_CLIENT_CONNECT, $hs);
		} else {
			$this->e4 = @stream_socket_client("tcp://" . $a8 . ":" . $a9, $hu, $hv,
				$this->e6 / 1000);
		}
		if (!$this->e4) {
			throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, $hv);
		}
		$hw = @stream_set_timeout($this->e4, floor($this->e6 / 1000), (($this->e6 % 1000) * 1000));
		if ($hw === false) {
			throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "Socket set timeout error");
		}
	}
	private function hq()
	{
		if ($this->d0 !== MigratoryDataClient::TRANSPORT_HTTP) {
			$az = $this->hd->bs($this->a8, $this->ac, $this->bq);
			$hx = $this->hg->eg($az->a0());
			if ($hx === true) {
				$hx = $this->hf->e7();
			}
			if ($hx == false) {
				$this->hy();
				throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "Websocket handshake");
			}
		}
	}
	private function hr($ab)
	{
		$az = $this->hd->bp($this->a8, $this->bq);
		$this->he->d3($az, $this->d4, $this->hb, $this->dg);
		$this->hd->br($az);
		$hx = $this->hg->eg($az->a2());
		if ($hx === true) {
			$hx = $this->hf->e7();
		}
		if ($hx == false) {
			$this->hy();
			throw new MigratoryDataException(MigratoryDataException::E_CONNECTION_FAILED, $ab . ', socket_error');
		} else {
			$headers = e9::gt($hx);
			if (array_key_exists('error', $headers) && $headers['error'] == gl::gp) {
				$hz = '';
				if (array_key_exists('reason', $headers)) {
					$hz = $headers['reason'];
				}
				throw new MigratoryDataException(MigratoryDataException::E_CONNECTION_DENY, $ab . ", Got connect response: " . $hz);
			}
			if (array_key_exists('session', $headers)) {
				$this->dj = $headers['session'];
                if (array_key_exists('message_size', $headers)) {
                    $this->hi = $headers['message_size'];
                }
			} else {
				$this->hy();
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, $ab . ", Got connect response: " . $hx);
			}
		}
	}
	public function i0()
	{
		$this->hh = false;
		$this->hy();
	}
	private function hy()
	{
		$this->dj = -1;
		if ($this->e4 != null) {
			@fclose($this->e4);
		}
		$this->e4 = null;
		$this->hf = null;
		$this->hg = null;
	}
	public function i1($di)
	{
		$i2 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
		if ($this->dj == -1) {
			$this->hy();
			try {
				$this->hj();
			} catch (MigratoryDataException $ho) {
				return $i2;
			}
		}
		$az = $this->hd->bp($this->a8, $this->bq);
		$this->he->dh($az, $di, $this->dj);
		$this->hd->br($az);
        if (isset($this->hi) && ($az->a3() - $az->m()) > $this->hi) {
            return MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED;
        }
		$hx = $this->hg->eg($az->a2());
		if ($hx === true) {
			$hx = $this->hf->e7();
		}
		if ($hx == false) {
			$this->hy();
			return $i2;
		} else {
			$headers = e9::gt($hx);
			if (array_key_exists('reason', $headers)) {
				$reason = $headers['reason'];
				if ("OK" == $reason) {
					$i2 = MigratoryDataClient::NOTIFY_PUBLISH_OK;
				} else if ("DENY" == $reason) {
					$i2 = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
				} else {
					$i2 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
				}
			} else {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, "Got publish response: " . $hx . strlen($hx));
			}
		}
		return $i2;
	}
	public function i3($am)
	{
		$this->hc = new ak($am, $this->ac);
	}
	public function i4($d4)
	{
		$this->d4 = $d4;
	}
	public function i5($e6)
	{
		$this->e6 = $e6;
	}
	public function i6($ac)
	{
		$this->ac = $ac;
		if (!is_null($this->hc)) {
			$this->hc->ap($ac);
		}
	}
	public function i7($d0)
	{
		if ($d0 === MigratoryDataClient::TRANSPORT_HTTP) {
			$this->d0 = $d0;
			$this->hd = new co();
			$this->he->d1();
		}
	}
	public function i8($i9, $p)
	{
		$this->bq[$i9] = $p;
	}
	public function ia()
	{
		return $this->hc;
	}
	public function ib()
	{
		return $this->d4;
	}
	public function ic()
	{
		return $this->hh;
	}
}
class id
{
	private $ie = null;
	public function __construct()
	{
		$this->ie = new ha();
	}
	public function ig($ih)
	{
		if ($this->ie->ic() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEntitlementToken() method");
		}
		if (trim($ih) === '') {
			throw  new MigratoryDataException(MigratoryDataException::E_ENTITLEMENT_TOKEN);
		}
		$this->ie->i4($ih);
	}
	public function ii($am)
	{
		if ($this->ie->ic() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setServers() method");
		}
		if (!is_array($am) || count($am) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL_LIST);
		}
		foreach ($am as $addr) {
			if (!isset($addr) || trim($addr) === '') {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $addr);
			}
		}
		$this->ie->i3($am);
	}
	public function hj()
	{
		if ($this->ie->ic() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
		}
		$d4 = $this->ie->ib();
		if (!isset($d4)) {
			throw  new MigratoryDataException(MigratoryDataException::E_ENTITLEMENT_TOKEN);
		}
		$hc = $this->ie->ia();
		if (!isset($hc)) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL_LIST, "Before connect() you need to use setServers().");
		}
		try {
			$this->ie->hj();
		} catch (MigratoryDataException $e) {
			throw new MigratoryDataException(MigratoryDataException::E_CLUSTER_MEMBERS_CONNECTION_FAILED, "", $e->getExceptions());
		}
	}
	public function hy()
	{
		if ($this->ie->ic() === true) {
			$this->ie->i0();
		}
	}
	public function i1($di)
	{
		if ($this->ie->ic() === false) {
			throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
		}
		if (is_null($di)) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_NULL);
		}
		if (!($di instanceof MigratoryDataMessage)) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_INVALID);
		}
		$ij = $di->getSubject();
		$dz = $di->getContent();
		if (is_null($ij) || strlen($ij) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_SUBJECT, "subject is empty");
		}
		if (is_null($dz) || strlen($dz) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_NULL, "content of the message is null");
		}
		return $this->ie->i1($di);
	}
	public function ik($il)
	{
		if ($this->ie->ic() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
		}
		$this->ie->i7($il);
	}
	public function i8($i9, $p)
	{
		if ($this->ie->ic() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "i8() method");
		}
		if (is_null($i9) || strlen($i9) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, "i8() - name is empty");
		}
		if (is_null($p) || strlen($p) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, "i8() - value is empty");
		}
		$this->ie->i8($i9, $p);
	}
	public function i6($bt)
	{
		if ($this->ie->ic() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
		}
		$this->ie->i6($bt);
	}
	public function im($e6)
	{
		if ($this->ie->ic() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
		}
		$this->ie->i5($e6);
	}
}
class MigratoryDataException extends \Exception
{
	const E_INVALID_SUBJECT = 1;
	const E_TRANSPORT_INIT_FAILED = 2;
	const E_CONNECTION_FAILED = 3;
	const E_MSG_NULL = 4;
	const E_MSG_INVALID = 5;
	const E_CLUSTER_MEMBERS_CONNECTION_FAILED = 7;
	const E_INVALID_URL_LIST = 8;
	const E_INVALID_URL = 9;
	const E_INVALID_PROTOCOL = 10;
	const E_ENTITLEMENT_TOKEN = 11;
	const E_RUNNING = 12;
	const E_NOT_CONNECTED = 13;
	const E_CONNECTION_DENY = 14;
	protected $hl = array();
	protected $in = "";
	protected $code = -1;
	protected $message = "";
	public function getCause()
	{
		return $this->in;
	}
	public function getDetail()
	{
		return $this->message;
	}
	public function getExceptions()
	{
		return $this->hl;
	}
	public function __construct($code, $cause = "", $exceptions = array())
	{
		$this->code = $code;
		$this->in = $cause;
		$this->hl = $exceptions;
		$this->message = $this->getErrorInfo($code);
	}
	private function getErrorInfo($errorCode)
	{
		$ret = "";
		switch ($errorCode) {
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
			case self::E_RUNNING:
				$ret = "You can't use this method because the client is already running, use it before connect() or use disconnect()";
				break;
			case self::E_NOT_CONNECTED:
				$ret = "You can't use this method because you didn't connect to a MigratoryData server, use connect() first";
				break;
			case self::E_CONNECTION_DENY:
				$ret = "Connection deny.";
				break;	
			default:
				$ret = "Unknown";
				break;
		}
		return $ret;
	}
}
class QoS
{
	const STANDARD = 0;
	const GUARANTEED = 1;
}
class MigratoryDataMessage
{
	private $ij = "";
	private $dz = "";
	private $io = null;
	private $ip = null;
    protected $iq;
    public function __construct($subject, $content, $qos = QoS::GUARANTEED, $retained = true)
	{
		if (e9::gs($subject)) {
			$this->ij = $subject;
			$this->dz = $content;
			$this->io = $qos;
			$this->ip = $retained;
		} else {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_SUBJECT, $subject);
		}
	}
	public function getSubject()
	{
		return $this->ij;
	}
	public function getContent()
	{
		return $this->dz;
	}
	public function getQos()
	{
		return $this->io;
	}
	public function isRetained()
	{
		return $this->ip;
	}
    public function setCompressed($compressionBool)
    {
        $this->iq = $compressionBool;
    }
    public function isCompressed()
    {
        return $this->iq;
    }
}
class MigratoryDataClient
{
	const NOTIFY_PUBLISH_OK = 'NOTIFY_PUBLISH_OK';
	const NOTIFY_PUBLISH_FAILED = 'NOTIFY_PUBLISH_FAILED';
    const NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED = 'NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED';
    const NOTIFY_PUBLISH_DENIED = 'NOTIFY_PUBLISH_DENIED';
	const TRANSPORT_HTTP = 'TRANSPORT_HTTP';
	const TRANSPORT_WEBSOCKET = 'TRANSPORT_WEBSOCKET';
	private $ir = null;
	public function __construct()
	{
		$this->ir = new id();
	}
	public function setEntitlementToken($ih)
	{
		$this->ir->ig($ih);
	}
	public function setServers($am)
	{
		$this->ir->ii($am);
	}
	public function connect()
	{
		$this->ir->hj();
	}
	public function disconnect()
	{
		$this->ir->hy();
	}
	public function publish($di)
	{
		return $this->ir->i1($di);
	}
	public function setTransport($il)
	{
		$this->ir->ik($il);
	}
	public function setHttpHeader($i9, $p)
	{
		$this->ir->i8($i9, $p);
	}
	public function setEncryption($bt)
	{
		$this->ir->i6($bt);
	}
	public function setConnectionTimeout($e6)
	{
		$this->ir->im($e6);
	}
}

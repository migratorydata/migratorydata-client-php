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
	public function bp($a8);
	public function bq($az);
	public function br($a8, $bs);
}
class bt implements bo
{
	private $bu = "GET /WebSocketConnection HTTP/1.1";
	private $bv = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $bw = "Host: ";
	private $bx = "Origin: ";
	private $by = "Upgrade: websocket";
	private $bz = "Sec-WebSocket-Key: 23eds34dfvce4";
	private $c0 = "Sec-WebSocket-Version: 13";
	private $c1 = "Sec-WebSocket-Protocol: pushv1";
	private $c2 = "Connection: Upgrade";
	private $c3 = "\r\n";
	private $c4 = 10;
	private $c5 = -128;
	private $c6 = -128;
	private $c7 = 0x02;
	public function __construct()
	{
	}
	public function bp($a8)
	{
		$az = new a();
		for ($bh = 0; $bh < $this->c4; $bh++) {
			$az->j(chr(0x00));
		}
		for ($bh = 0; $bh < 4; $bh++) {
			$c8 = chr(rand(0, 100));
			$az->j($c8);
			$az->k($c8);
		}
		$az->t();
		return $az;
	}
	public function bq($az)
	{
		$bb = chr($this->c5) | chr($this->c7);
		$az->u();
		$c9 = $az->y() - $az->x();
		$ca = $this->cb($c9);
		$cc = $this->cd($c9, $ca);
		$ce = 0;
		if ($ca === 1) {
			$ce = 8;
			$az->n($ce, $bb);
			$az->n($ce + 1, $cc[0] | chr($this->c6));
		} else if ($ca === 2) {
			$ce = 6;
			$az->n($ce, $bb);
			$az->n($ce + 1, chr(126) | chr($this->c6));
			for ($bh = 0; $bh <= 1; $bh++) {
				$az->n($ce + 2 + $bh, $cc[$bh]);
			}
		} else {
			$az->n($ce, $bb);
			$az->n($ce + 1, chr(127) | chr($this->c6));
			for ($bh = 0; $bh <= 7; $bh++) {
				$az->n($ce + 2 + $bh, $cc[$bh]);
			}
		}
		$az->g($ce);
	}
	public function br($a8, $bs)
	{
		$az = new a();
		if (!$bs) {
			$az->j($this->bu);
		} else {
			$az->j($this->bv);
		}
		$az->j($this->c3);
		$az->j($this->bx);
		$az->j("http://" . $a8);
		$az->j($this->c3);
		$az->j($this->bw);
		$az->j($a8);
		$az->j($this->c3);
		$az->j($this->by);
		$az->j($this->c3);
		$az->j($this->c2);
		$az->j($this->c3);
		$az->j($this->bz);
		$az->j($this->c3);
		$az->j($this->c0);
		$az->j($this->c3);
		$az->j($this->c1);
		$az->j($this->c3);
		$az->j($this->c3);
		return $az;
	}
	private function cb($cf)
	{
		if ($cf <= 125) {
			return 1;
		} else if ($cf <= 65535) {
			return 2;
		}
		return 8;
	}
	private function cd($p, $ca)
	{
		$az = "";
		$cg = 8 * $ca - 8;
		for ($bh = 0; $bh < $ca; $bh++) {
			$ch = $this->ci($p, $cg - 8 * $bh);
			$cj = $ch - (256 * intval($ch / 256));
			$az .= chr($cj);
		}
		return $az;
	}
	private function ci($ck, $cl)
	{
		return ($ck % 0x100000000) >> $cl;
	}
}
class cm implements bo
{
	private $cn = "POST / HTTP/1.1";
	private $bw = "Host: ";
	private $co = "Content-Length: ";
	private $cp = "00000";
	private $c3 = "\r\n";
	public function __construct()
	{
	}
	public function bp($a8)
	{
		$az = new a();
		$az->j($this->cn);
		$az->j($this->c3);
		$az->j($this->bw);
		$az->j(b2::cq($a8));
		$az->j($this->c3);
		$az->j($this->co);
		$az->r();
		$az->j($this->cp);
		$az->j($this->c3);
		$az->j($this->c3);
		$az->s();
		return $az;
	}
	public function bq($az)
	{
		$o = $az->a3();
		$cr = strval($o - $az->w());
		if (strlen($cr) <= strlen($this->cp)) {
			$cs = 0;
			for ($bh = strlen($this->cp) - strlen($cr); $bh < strlen($this->cp); $bh++) {
				$az->n($az->v() + $bh, $cr[$cs]);
				$cs++;
			}
		} else {
			$ct = substr($az->a0(), 0, $az->v());
			$ct .= $cr;
			$ct .= substr($az->a0(), $az->v() + strlen($this->cp));
			$az->z($ct);
		}
		$az->a1();
	}
	public function br($a8, $bs)
	{
		return "";
	}
}
class cu
{
	private $cv = cw::cx;
	private $cy = MigratoryDataClient::TRANSPORT_WEBSOCKET;
	public function __construct()
	{
	}
	public function cz()
	{
		$this->cy = MigratoryDataClient::TRANSPORT_HTTP;
		$this->cv = cw::d0;
	}
	public function d1($az, $d2, $d3, $d4)
	{
		if ($this->cy == MigratoryDataClient::TRANSPORT_HTTP) {
			$az->j(chr(b2::d5(d6::d7)));
		} else {
			$az->j(chr(b2::d5(d6::d7)) ^ $az->l());
		}
		$az->j($this->d8(b2::d9(da::db), b2::cq($d2), $az));
		$az->j($this->d8(b2::d9(da::cv), b2::dc($this->cv), $az));
		$az->j($this->d8(b2::d9(da::dd), b2::dc($d3), $az));
		$az->j($this->d8(b2::d9(da::de), b2::dc($d4), $az));
		if ($this->cy == MigratoryDataClient::TRANSPORT_HTTP) {
			$az->j(chr(b2::b3));
		} else {
			$az->j(chr(b2::b3) ^ $az->l());
		}
	}
	public function df($az, $dg, $dh)
	{
		if ($this->cy == MigratoryDataClient::TRANSPORT_HTTP) {
			$az->j(chr(b2::d5(d6::di)));
		} else {
			$az->j(chr(b2::d5(d6::di)) ^ $az->l());
		}
		$az->j($this->d8(b2::d9(da::dj), b2::cq($dg->getSubject()), $az));
        if ($dg->isCompressed()) {
            $dk = $this->dl($dg->getContent());
            if (strlen($dk) < strlen($dg->getContent())) {
                $az->j($this->d8(b2::d9(da::dm), b2::cq($dk), $az));
            } else {
                $az->j($this->d8(b2::d9(da::dm), b2::cq($dg->getContent()), $az));
                $dg->setCompressed(false);
            }
        } else {
            $az->j($this->d8(b2::d9(da::dm), b2::cq($dg->getContent()), $az));
        }
		$dn = "c";
		if ($dn != null && strlen($dn) > 0) {
			$az->j($this->d8(b2::d9(da::dp), b2::cq($dn), $az));
		}
		$az->j($this->d8(b2::d9(da::dq), b2::dc($dh), $az));
		if ($dg->getQos() == QoS::GUARANTEED) {
			$az->j($this->d8(b2::d9(da::dr), b2::dc(QoS::GUARANTEED), $az));
		} else {
			$az->j($this->d8(b2::d9(da::dr), b2::dc(QoS::STANDARD), $az));
		}
		if ($dg->isRetained() == true) {
			$az->j($this->d8(b2::d9(da::ds), b2::dc(1), $az));
		} else {
			$az->j($this->d8(b2::d9(da::ds), b2::dc(0), $az));
		}
        if ($dg->isCompressed()) {
            $az->j($this->d8(b2::d9(da::dt), b2::dc(1), $az));
        }
		$az->j($this->d8(b2::d9(da::cv), b2::dc($this->cv), $az));
		if ($this->cy == MigratoryDataClient::TRANSPORT_HTTP) {
			$az->j(chr(b2::b3));
		} else {
			$az->j(chr(b2::b3) ^ $az->l());
		}
	}
	private function d8($du, $b, $az)
	{
		$dv = '';
		if ($this->cy == MigratoryDataClient::TRANSPORT_HTTP) {
			$dv .= chr($du);
			$dv .= $b;
			$dv .= chr(b2::dw);
		} else {
			$dv .= chr($du) ^ $az->l();
			for ($bh = 0; $bh < strlen($b); $bh++) {
				$dv .= $b[$bh] ^ $az->l();
			}
			$dv .= chr(b2::dw) ^ $az->l();
		}
		return $dv;
	}
    public function dl($dx)
    {
        $dy = gzdeflate($dx);
        if ($dy === false) {
            return $dx;
        }
        $dz = base64_encode($dy);
        return $dz;
    }
}
class e0
{
	const e1 = 32768;
	private $e2;
	private $cy;
	private $e3;
	public function __construct($e2, $cy, $e4)
	{
		$this->e2 = $e2;
		$this->cy = $cy;
		$this->e3 = $e4 / 1000;
	}
	public function e5()
	{
		$az = new a();
		$o = -1;
		$e6 = microtime(true);
		while ($o == -1) {
			$b = @fread($this->e2, e0::e1);
			if ($b === false) {
				return "";
			}
			if (strlen($b) == 0) {
				return "";
			}
			$az->j($b);
			if ($this->cy === MigratoryDataClient::TRANSPORT_HTTP) {
				$o = e7::e8($az->a0());
			} else {
				$o = ax::ay($az);
				if ($o === -1 && strpos($az->a0(), "Sec-WebSocket-Accept") !== false) {
					return $az;
				}
			}
			if ($o != -1 && b2::ba($az->q($o)) == b2::d5(d6::e9)) {
				$ea = 2;
				if ($this->cy === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
					$ea++;
				}
				$eb = $az->a3();
				$az->z(substr($az->a0(), $o + $ea));
				if ($eb === $o + $ea) {
					$o = -1;
				}
			}
			$ec = (microtime(true) - $e6);
			if ($ec >= $this->e3 && $az->a3() === 0) {
				return "";
			}
		}
		$az->g($o);
		return $az;
	}
}
class ed
{
	private $e2;
	public function __construct($e2)
	{
		$this->e2 = $e2;
	}
	public function ee($b)
	{
		$ef = $b;
		$eg = strlen($b);
		while (true) {
			$eh = @fwrite($this->e2, $ef);
			if ($eh === false) {
				return false;
			}
			if ($eh < $eg) {
				$ef = substr($ef, $eh);
				$eg -= $eh;
			} else {
				break;
			}
		}
		return true;
	}
}
class b2
{
	public static $ei = array();
	public static $ej = array();
	public static $ek = array();
	public static $el = array();
	const em = 0x19;
	const b3 = 0x7F;
	const dw = 0x1E;
	const en = 0x1F;
	public static function eo()
	{
		self::$ei = array_fill(0, 128, -1);
		self::$ei[d6::ep] = 0x01;
		self::$ei[d6::eq] = 0x02;
		self::$ei[d6::er] = 0x03;
		self::$ei[d6::e9] = 0x04;
		self::$ei[d6::es] = 0x05;
		self::$ei[d6::et] = 0x06;
		self::$ei[d6::eu] = 0x08;
		self::$ei[d6::ev] = 0x09;
		self::$ei[d6::ew] = 0x0C;
		self::$ei[d6::di] = 0x10;
		self::$ei[d6::ex] = 0x13;
		self::$ei[d6::d7] = 0x1A;
		self::$ei[d6::ey] = 0x07;
		self::$ei[d6::ez] = 0x0B;
		self::$ej = array_fill(0, 128, -1);
		self::$ej[da::dj] = 0x01;
		self::$ej[da::dm] = 0x02;
		self::$ej[da::f0] = 0x03;
		self::$ej[da::f1] = 0x04;
		self::$ej[da::cv] = 0x05;
		self::$ej[da::dq] = 0x06;
		self::$ej[da::f2] = 0x07;
		self::$ej[da::f3] = 0x08;
		self::$ej[da::f4] = 0x09;
		self::$ej[da::f5] = 0x0C;
		self::$ej[da::f6] = 0x0E;
		self::$ej[da::f7] = 0x0F;
		self::$ej[da::dp] = 0x10;
		self::$ej[da::f8] = 0x11;
		self::$ej[da::f9] = 0x12;
		self::$ej[da::db] = 0x13;
		self::$ej[da::fa] = 0x14;
		self::$ej[da::fb] = 0x15;
		self::$ej[da::fc] = 0x16;
		self::$ej[da::ds] = 0x17;
		self::$ej[da::dr] = 0x18;
		self::$ej[da::fd] = 0x1A;
		self::$ej[da::fe] = 0x1B;
		self::$ej[da::ff] = 0x1C;
		self::$ej[da::fg] = 0x1D;
		self::$ej[da::fh] = 0x20;
		self::$ej[da::fi] = 0x27;
		self::$ej[da::fj] = 0x23;
		self::$ej[da::dd] = 0x24;
		self::$ej[da::fk] = 0x25;
		self::$ej[da::de] = 0x2D;
		self::$ej[da::fl] = 0x1D;
		self::$ej[da::dt] = 0x26;
		self::$ej[da::fm] = 0x0B;
		self::$el = array_fill(0, 255, -1);
		self::$el[self::b3] = 0x01;
		self::$el[self::dw] = 0x02;
		self::$el[self::en] = 0x03;
		self::$el[fo::fp] = 0x04;
		self::$el[fo::fq] = 0x05;
		self::$el[fo::fr] = 0x06;
		self::$el[fo::fs] = 0x07;
		self::$el[fo::ft] = 0x08;
		self::$el[33] = 0x09;
		self::$el[self::em] = 0x0B;
		self::$ek = array_fill(0, 255, -1);
		for ($i = 0; $i <= 128; $i++) {
			$e = self::fu($i);
			if ($e != -1) {
				self::$ek[$e] = $i;
			}
		}
	}
	public static function cq($b)
	{
		$fv = array_merge(unpack('C*', $b));
		$fw = 0;
		for ($bh = 0; $bh < count($fv); $bh++) {
			$fx = self::fu($fv[$bh]);
			if ($fx != -1) {
				$fw++;
			}
		}
		if ($fw == 0) {
			return call_user_func_array("pack", array_merge(array("C*"), $fv));
		}
		$dv = array_fill(0, count($fv) + $fw, 0);
		for ($bh = 0, $fy = 0; $bh < count($fv); $bh++, $fy++) {
			$fx = self::fu($fv[$bh]);
			if ($fx != -1) {
				$dv[$fy] = self::en;
				$dv[$fy + 1] = $fx;
				$fy++;
			} else {
				$dv[$fy] = $fv[$bh];
			}
		}
		return call_user_func_array("pack", array_merge(array("C*"), $dv));
	}
	public static function fz($b)
	{
		$fv = array_merge(unpack('C*', $b));
		$fw = 0;
		if (count($fv) == 0) {
			return $b;
		}
		for ($bh = 0; $bh < count($fv); $bh++) {
			if ($fv[$bh] == self::en) {
				$fw++;
			}
		}
		$dv = array_fill(0, count($fv) - $fw, 0);
		for ($bh = 0, $fy = 0; $bh < count($fv); $bh++, $fy++) {
			$b9 = $fv[$bh];
			if ($b9 == self::en) {
				if ($bh + 1 < count($fv)) {
					$dv[$fy] = self::g0($fv[$bh + 1]);
					if ($dv[$fy] == -1) {
						throw new \InvalidArgumentException();
					}
					$bh++;
				} else {
					throw new \InvalidArgumentException();
				}
			} else {
				$dv[$fy] = $b9;
			}
		}
		return call_user_func_array("pack", array_merge(array("C*"), $dv));
	}
	public static function g1($b, $g2, $g3)
	{
		$du = null;
		$g4 = strpos($b, chr(self::d9($g2)));
		$g5 = strpos($b, chr(self::dw), $g4);
		if ($g4 !== false && $g5 !== false) {
			$g6 = substr($b, $g4 + 1, $g5 - ($g4 + 1));
			switch ($g3) {
				case g7::g8:
					$du = $g6;
					break;
				case g7::g9:
					$du = $g6;
					break;
				case g7::ga:
					$du = $g6;
					break;
				case g7::gb:
					$du = self::ba($g6);
					break;
			}
		}
		return $du;
	}
	public static function ba($gc)
	{
		$b = array_merge(unpack("C*", $gc));
		$dv = 0;
		$gd = -1;
		$ck = 0;
		$ge;
		$b9;
		$gf = count($b);
		$o = 0;
		if ($gf == 1) {
			return $b[0];
		} else if ($gf == 2 && $b[$o] == self::en) {
			$b9 = self::g0($b[$o + 1]);
			if ($b9 != -1) {
				return $b9;
			} else {
				throw new \InvalidArgumentException();
			}
		}
		for (; $gf > 0; $gf--) {
			$b9 = $b[$o];
			$o++;
			if ($b9 == self::en) {
				if ($gf - 1 < 0) {
					throw new \InvalidArgumentException();
				}
				$gf--;
				$b9 = $b[$o];
				$o++;
				$ge = self::g0($b9);
				if ($ge == -1) {
					throw new \InvalidArgumentException();
				}
			} else {
				$ge = $b9;
			}
			if ($gd > 0) {
				$ck |= $ge >> $gd;
				$dv = $dv << 8 | ($ck >= 0 ? $ck : $ck + 256);
				$ck = ($ge << (8 - $gd));
			} else {
				$ck = ($ge << -$gd);
			}
			$gd = ($gd + 7) % 8;
		}
		return $dv;
	}
	public static function dc($ck)
	{
		if (($ck & 0xFFFFFF80) == 0) {
			$i = self::fu($ck);
			if ($i == -1) {
				return pack('C*', $ck);
			} else {
				return pack('C*', self::en, $i);
			}
		}
		$gg = 0;
		if (($ck & 0xFF000000) != 0) {
			$gg = 24;
		} else if (($ck & 0x00FF0000) != 0) {
			$gg = 16;
		} else {
			$gg = 8;
		}
		$dv = array_fill(0, 10, 0);
		$gh = 0;
		$gi = 0;
		while ($gg >= 0) {
			$b = (($ck >> $gg) & 0xFF);
			$gi++;
			$dv[$gh] |= ($b >= 0 ? $b : $b + 256) >> $gi;
			$fx = self::fu($dv[$gh]);
			if ($fx != -1) {
				$dv[$gh] = self::en;
				$dv[$gh + 1] = $fx;
				$gh++;
			}
			$gh++;
			$dv[$gh] |= ($b << (7 - $gi)) & 0x7F;
			$gg -= 8;
		}
		$fx = self::fu($dv[$gh]);
		if ($fx != -1) {
			$dv[$gh] = self::en;
			$dv[$gh + 1] = $fx;
			$gh++;
		}
		$gh++;
		if ($gh < count($dv)) {
			$dv = array_slice($dv, 0, $gh);
		}
		return call_user_func_array("pack", array_merge(array("C*"), $dv));
	}
	public static function g0($b)
	{
		return $b >= 0 ? self::$ek[$b] : -1;
	}
	public static function fu($b)
	{
		return $b >= 0 ? self::$el[$b] : -1;
	}
	public static function d9($h)
	{
		return self::$ej[$h];
	}
	public static function d5($o)
	{
		return self::$ei[$o];
	}
}
class d6
{
	const ep = 0;
	const eq = 1;
	const er = 2;
	const e9 = 3;
	const es = 4;
	const et = 5;
	const eu = 6;
	const ev = 7;
	const ew = 8;
	const di = 9;
	const ex = 10;
	const d7 = 11;
	const ey = 12;
	const ez = 13;
}
class da
{
	const dj = 0;
	const dm = 1;
	const f0 = 2;
	const f1 = 3;
	const cv = 4;
	const dq = 5;
	const f2 = 6;
	const f3 = 7;
	const f4 = 8;
	const f5 = 9;
	const f6 = 10;
	const f7 = 11;
	const f9 = 12;
	const db = 13;
	const fa = 14;
	const fb = 15;
	const fc = 16;
	const ds = 17;
	const dr = 18;
	const fd = 19;
	const fe = 20;
	const ff = 21;
	const fg = 22;
	const fh = 23;
	const fi = 24;
	const fj = 25;
	const dd = 26;
	const fk = 27;
	const dp = 28;
	const f8 = 29;
	const de = 30;
	const fl = 31;
	const dt = 32;
	const fm = 33;
}
class g7
{
	const g8 = 0;
	const g9 = 1;
	const ga = 2;
	const gb = 3;
}
class fo
{
	const fp = 0x00;
	const fs = 0x22;
	const fq = 0x0A;
	const fr = 0x0D;
	const ft = 0x5C;
}
class cw
{
	const d0 = 4;
	const cx = 8;
}
class gj
{
	const gk = 0;
	const gl = 1;
	const gm = 2;
	const gn = 3;
}
b2::eo();
class e7
{
	const go = '/^\/([^\/]+\/)*([^\/]+|\*)$/';
	const gp = "\r\n\r\n";
	const co = "Content-Length: ";
	public static function gq($g6)
	{
		return preg_match(self::go, $g6);
	}
	public static function gr($az)
	{
		$gs = array();
		$o = $az->m();
		$gt = ord($az->q($o));
		$o++;
		while (true) {
			$du = ord($az->q($o));
			$o++;
			$bh = strpos($az->a0(), chr(b2::dw), $o);
			if ($bh === false) {
				break;
			}
			$fv = substr($az->a0(), $o, ($bh - $o));
			if ($du == b2::d9(da::dq)) {
				$gs['session'] = b2::ba($fv);
			} else if ($du == b2::d9(da::fa)) {
				$gs['reason'] = $fv;
			} else if ($du == b2::d9(da::fl)) {
                $gs['message_size'] = b2::ba($fv);
            } else if ($du == b2::d9(da::fm)) {
				$gs['error'] = b2::ba($fv);
			}
			$o = $bh + 1;
			if ($o >= $az->a3()) {
				break;
			}
		}
		return $gs;
	}
	public static function e8($b)
	{
		$gu = b2::cq(e7::co);
		$o = e7::gv($gu, $b);
		if ($o == -1) {
			return -1;
		}
		$o += strlen($gu);
		$gw = "\r";
		$gx = e7::gy($b, $o, strlen($b), $gw);
		if ($gx == -1) {
			return -1;
		}
		$gz = substr($b, $o, $gx - $o);
		$h0 = intval($gz);
		$o = e7::gv(e7::gp, $b);
		if ($o == -1) {
			return $o;
		}
		$o += strlen(e7::gp);
		if (($o + $h0) > strlen($b)) {
			return -1;
		}
		return $o;
	}
	private static function gy($b, $at, $au, $h1)
	{
		for ($bh = $at; $bh < $au; $bh++) {
			if ($b[$bh] == $h1) {
				return $bh;
			}
		}
		return -1;
	}
	private static function gv($h2, $h3)
	{
		$h4 = strlen($h2);
		$cl = strlen($h3);
		$h5 = array_fill(0, $h4, 0);
		e7::h6($h2, $h4, $h5);
		$bh = 0;
		$fy = 0;
		while ($bh < $cl) {
			if ($h2[$fy] == $h3[$bh]) {
				$fy++;
				$bh++;
			}
			if ($fy == $h4) {
				return $bh - $fy;
			} else if ($bh < $cl && $h2[$fy] != $h3[$bh]) {
				if ($fy != 0)
					$fy = $h5[$fy - 1];
				else
					$bh = $bh + 1;
			}
		}
		return -1;
	}
	private static function h6($h2, $h4, &$h5)
	{
		$gf = 0;
		$h5[0] = 0;
		$bh = 1;
		while ($bh < $h4) {
			if ($h2[$bh] == $h2[$gf]) {
				$gf++;
				$h5[$bh] = $gf;
				$bh++;
			} else {
				if ($gf != 0) {
					$gf = $h5[$gf - 1];
				} else {
					$h5[$bh] = 0;
					$bh++;
				}
			}
		}
	}
}
class Version
{
        //      6       h7   xx   h7 xxx
    // push version h7 API ID h7 API version
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
class h8
{
	private $h9 = 3;
	private $de = Version::VERSION;
	private $e4 = 1000;
	private $ac = false;
	private $a8 = null;
	private $ha = null;
	private $d2 = null;
	private $hb = null;
	private $hc = null;
	private $cy = null;
	private $e2 = null;
	private $hd = null;
	private $he = null;
	private $dh = -1;
	private $hf = false;
	private $hg = null;
	public function __construct()
	{
		$this->cy = MigratoryDataClient::TRANSPORT_WEBSOCKET;
		$this->hb = new bt();
		$this->hc = new cu();
	}
	public function hh($hi = null)
	{
		if (is_null($hi)) {
			$hj = array();
			$hk = true;
			foreach ($this->ha->ao() as $hl) {
				try {
					$this->hh($hl);
					$hk = false;
					break;
				} catch (MigratoryDataException $hm) {
					$hj[] = $hm;
				}
			}
			if ($hk == true) {
				throw new MigratoryDataException(MigratoryDataException::E_CLUSTER_MEMBERS_CONNECTION_FAILED, "", $hj);
			}
		} else {
			$this->a8 = $hi->ah();
			$this->hn($this->a8, $hi->ai());
			$this->hd = new e0($this->e2, $this->cy, $this->e4);
			$this->he = new ed($this->e2);
			$this->ho();
			$this->hp($hi->aj());
			$this->hf = true;
		}
	}
	private function hn($a8, $a9)
	{
		if ($this->ac) {
			$hq = @stream_context_create();
			$hr = @stream_context_set_option($hq, 'ssl', 'allow_self_signed', true);
			if (!$hr) {
				throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "ssl socket creation");
			}
			$this->e2 = @stream_socket_client("tlsv1.2://" . $a8 . ":" . $a9, $hs, $ht,
				$this->e4 / 1000, STREAM_CLIENT_CONNECT, $hq);
		} else {
			$this->e2 = @stream_socket_client("tcp://" . $a8 . ":" . $a9, $hs, $ht,
				$this->e4 / 1000);
		}
		if (!$this->e2) {
			throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, $ht);
		}
		$hu = @stream_set_timeout($this->e2, floor($this->e4 / 1000), (($this->e4 % 1000) * 1000));
		if ($hu === false) {
			throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "Socket set timeout error");
		}
	}
	private function ho()
	{
		if ($this->cy !== MigratoryDataClient::TRANSPORT_HTTP) {
			$az = $this->hb->br($this->a8, $this->ac);
			$hv = $this->he->ee($az->a0());
			if ($hv === true) {
				$hv = $this->hd->e5();
			}
			if ($hv == false) {
				$this->hw();
				throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "Websocket handshake");
			}
		}
	}
	private function hp($ab)
	{
		$az = $this->hb->bp($this->a8);
		$this->hc->d1($az, $this->d2, $this->h9, $this->de);
		$this->hb->bq($az);
		$hv = $this->he->ee($az->a2());
		if ($hv === true) {
			$hv = $this->hd->e5();
		}
		if ($hv == false) {
			$this->hw();
			throw new MigratoryDataException(MigratoryDataException::E_CONNECTION_FAILED, $ab . ', socket_error');
		} else {
			$headers = e7::gr($hv);
			if (array_key_exists('error', $headers) && $headers['error'] == gj::gn) {
				$hx = '';
				if (array_key_exists('reason', $headers)) {
					$hx = $headers['reason'];
				}
				throw new MigratoryDataException(MigratoryDataException::E_CONNECTION_DENY, $ab . ", Got connect response: " . $hx);
			}
			if (array_key_exists('session', $headers)) {
				$this->dh = $headers['session'];
                if (array_key_exists('message_size', $headers)) {
                    $this->hg = $headers['message_size'];
                }
			} else {
				$this->hw();
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, $ab . ", Got connect response: " . $hv);
			}
		}
	}
	public function hy()
	{
		$this->hf = false;
		$this->hw();
	}
	private function hw()
	{
		$this->dh = -1;
		if ($this->e2 != null) {
			@fclose($this->e2);
		}
		$this->e2 = null;
		$this->hd = null;
		$this->he = null;
	}
	public function hz($dg)
	{
		$i0 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
		if ($this->dh == -1) {
			$this->hw();
			try {
				$this->hh();
			} catch (MigratoryDataException $hm) {
				return $i0;
			}
		}
		$az = $this->hb->bp($this->a8);
		$this->hc->df($az, $dg, $this->dh);
		$this->hb->bq($az);
        if (isset($this->hg) && ($az->a3() - $az->m()) > $this->hg) {
            return MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED;
        }
		$hv = $this->he->ee($az->a2());
		if ($hv === true) {
			$hv = $this->hd->e5();
		}
		if ($hv == false) {
			$this->hw();
			return $i0;
		} else {
			$headers = e7::gr($hv);
			if (array_key_exists('reason', $headers)) {
				$reason = $headers['reason'];
				if ("OK" == $reason) {
					$i0 = MigratoryDataClient::NOTIFY_PUBLISH_OK;
				} else if ("DENY" == $reason) {
					$i0 = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
				} else {
					$i0 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
				}
			} else {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, "Got publish response: " . $hv . strlen($hv));
			}
		}
		return $i0;
	}
	public function i1($am)
	{
		$this->ha = new ak($am, $this->ac);
	}
	public function i2($d2)
	{
		$this->d2 = $d2;
	}
	public function i3($e4)
	{
		$this->e4 = $e4;
	}
	public function i4($ac)
	{
		$this->ac = $ac;
		if (!is_null($this->ha)) {
			$this->ha->ap($ac);
		}
	}
	public function i5($cy)
	{
		if ($cy === MigratoryDataClient::TRANSPORT_HTTP) {
			$this->cy = $cy;
			$this->hb = new cm();
			$this->hc->cz();
		}
	}
	public function i6()
	{
		return $this->ha;
	}
	public function i7()
	{
		return $this->d2;
	}
	public function i8()
	{
		return $this->hf;
	}
}
class i9
{
	private $ia = null;
	public function __construct()
	{
		$this->ia = new h8();
	}
	public function ib($ic)
	{
		if ($this->ia->i8() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEntitlementToken() method");
		}
		if (trim($ic) === '') {
			throw  new MigratoryDataException(MigratoryDataException::E_ENTITLEMENT_TOKEN);
		}
		$this->ia->i2($ic);
	}
	public function id($am)
	{
		if ($this->ia->i8() === true) {
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
		$this->ia->i1($am);
	}
	public function hh()
	{
		if ($this->ia->i8() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
		}
		$d2 = $this->ia->i7();
		if (!isset($d2)) {
			throw  new MigratoryDataException(MigratoryDataException::E_ENTITLEMENT_TOKEN);
		}
		$ha = $this->ia->i6();
		if (!isset($ha)) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL_LIST, "Before connect() you need to use setServers().");
		}
		try {
			$this->ia->hh();
		} catch (MigratoryDataException $e) {
			throw new MigratoryDataException(MigratoryDataException::E_CLUSTER_MEMBERS_CONNECTION_FAILED, "", $e->getExceptions());
		}
	}
	public function hw()
	{
		if ($this->ia->i8() === true) {
			$this->ia->hy();
		}
	}
	public function hz($dg)
	{
		if ($this->ia->i8() === false) {
			throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
		}
		if (is_null($dg)) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_NULL);
		}
		if (!($dg instanceof MigratoryDataMessage)) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_INVALID);
		}
		$ie = $dg->getSubject();
		$dx = $dg->getContent();
		if (is_null($ie) || strlen($ie) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_SUBJECT, "subject is empty");
		}
		if (is_null($dx) || strlen($dx) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_NULL, "content of the message is null");
		}
		return $this->ia->hz($dg);
	}
	public function ig($ih)
	{
		if ($this->ia->i8() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
		}
		$this->ia->i5($ih);
	}
	public function i4($bs)
	{
		if ($this->ia->i8() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
		}
		$this->ia->i4($bs);
	}
	public function ii($e4)
	{
		if ($this->ia->i8() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
		}
		$this->ia->i3($e4);
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
	protected $hj = array();
	protected $ij = "";
	protected $code = -1;
	protected $message = "";
	public function getCause()
	{
		return $this->ij;
	}
	public function getDetail()
	{
		return $this->message;
	}
	public function getExceptions()
	{
		return $this->hj;
	}
	public function __construct($code, $cause = "", $exceptions = array())
	{
		$this->code = $code;
		$this->ij = $cause;
		$this->hj = $exceptions;
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
	private $ie = "";
	private $dx = "";
	private $ik = null;
	private $il = null;
    protected $im;
    public function __construct($subject, $content, $qos = QoS::GUARANTEED, $retained = true)
	{
		if (e7::gq($subject)) {
			$this->ie = $subject;
			$this->dx = $content;
			$this->ik = $qos;
			$this->il = $retained;
		} else {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_SUBJECT, $subject);
		}
	}
	public function getSubject()
	{
		return $this->ie;
	}
	public function getContent()
	{
		return $this->dx;
	}
	public function getQos()
	{
		return $this->ik;
	}
	public function isRetained()
	{
		return $this->il;
	}
    public function setCompressed($compressionBool)
    {
        $this->im = $compressionBool;
    }
    public function isCompressed()
    {
        return $this->im;
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
	private $in = null;
	public function __construct()
	{
		$this->in = new i9();
	}
	public function setEntitlementToken($ic)
	{
		$this->in->ib($ic);
	}
	public function setServers($am)
	{
		$this->in->id($am);
	}
	public function connect()
	{
		$this->in->hh();
	}
	public function disconnect()
	{
		$this->in->hw();
	}
	public function publish($dg)
	{
		return $this->in->hz($dg);
	}
	public function setTransport($ih)
	{
		$this->in->ig($ih);
	}
	public function setEncryption($bs)
	{
		$this->in->i4($bs);
	}
	public function setConnectionTimeout($e4)
	{
		$this->in->ii($e4);
	}
}

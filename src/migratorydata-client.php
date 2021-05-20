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
        if($this->g === 0){
            return $this->b;
        } else {
            return substr($this->b, $this->g);
        }
    }
	public function a2()
	{
		return strlen($this->b);
	}
}
class a3
{
	private $a4 = 80;
	private $a5 = 443;
	private $a6 = false;
	private $a7;
	private $a8;
	private $a9;
	public function __construct($aa, $ab)
	{
		$this->a9 = $aa;
		$ac = strrpos($aa, '/');
		$ad = $ac === false ? $aa : substr($aa, $ac + 1);
		$ae = strrpos($ad, ':');
		if ($ae !== false) {
			$this->a7 = substr($ad, 0, $ae);
			$this->a8 = intval(substr($ad, $ae + 1));
			if ($this->a8 < 0 || $this->a8 > 65535) {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $aa . " - invalid port number");
			}
			if ($this->a7 === "*") {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $aa . " - wildcard address (*) cannot be used to define a cluster member");
			}
		} else {
			$this->a7 = $ad;
			if ($ab === false) {
				$this->a8 = $this->a4;
			} else {
				$this->a8 = $this->a5;
			}
			$this->a6 = true;
		}
	}
	public function af($ab)
	{
		if ($this->a6 === true) {
			if ($ab === true) {
				$this->a8 = $this->a5;
			} else {
				$this->a8 = $this->a4;
			}
		}
	}
	public function ag()
	{
		return $this->a7;
	}
	public function ah()
	{
		return $this->a8;
	}
	public function ai()
	{
		return $this->a9;
	}
}
class aj
{
	private $ak = array();
	public function __construct($al, $ab)
	{
		foreach ($al as $am) {
			$this->ak[] = new a3($am, $ab);
		}
	}
	public function an()
	{
		$ak = $this->ak;
		shuffle($ak);
		return $ak;
	}
	public function ao($ab)
	{
		foreach ($this->ak as $ap) {
			$ap->af($ab);
		}
	}
}
class aq
{
	private $ar;
	private $at;
	public function __construct($ar, $at)
	{
		$this->ar = $ar;
		$this->at = $at;
	}
	public function au()
	{
		return $this->ar;
	}
	public function av()
	{
		return $this->at;
	}
}
class aw
{
	public static function ax($ay)
	{
		$az = aw::b0($ay->a0());
		$o = $az->au();
		if ($ay->a2() < $az->av()) {
			$o = -1;
		}
		if ($o === -1) {
			return $o;
		}
		while (ord($ay->q($o)) === b1::b2) {
			$o++;
		}
		return $o;
	}
	public static function b0($b)
	{
		$b3 = new aq(-1, -1);
		$o = 0;
		$b4 = 2;
		$b5 = 0;
		$b6 = 0;
		$b7 = strlen($b) - $o;
		if ($b7 < $b4) {
			return $b3;
		}
		$b8 = b1::b9($b[$o]);
		$ba = ($b8 >> 7) & 0x01;
		$bb = $b8 & 0x40;
		$bc = $b8 & 0x20;
		$bd = $b8 & 0x10;
		if ($ba !== 1 || $bb !== 0 || $bc !== 0 || $bd !== 0) {
			return $b3;
		}
		$o++;
		$b8 = b1::b9($b[$o]);
		$be = $b8 & 0x7F;
		if ($be < 126) {
			$b6 = 0;
			$b5 = $be;
		} else if ($be === 126) {
			$b6 = 2;
			if ($b7 < $b4 + $b6) {
				return $b3;
			}
			$bf = "";
			for ($bg = $o + 1; $bg <= $o + $b6; $bg++) {
				$bf .= $b[$bg];
			}
			$b5 = aw::bh($bf);
			$o += $b6;
		} else {
			$b6 = 8;
			if ($b7 < $b4 + $b6) {
				return $b3;
			}
			$bf = "";
			for ($bg = $o + 1; $bg <= $o + $b6; $bg++) {
				$bf .= $b[$bg];
			}
			$b5 = aw::bh($bf);
			$o += $b6;
		}
		if ($b7 < ($b4 + $b6 + $b5)) {
			return $b3;
		}
		$o += 1;
		return new aq($o, $o + $b5);
	}
	private static function bh($b)
	{
		if (strlen($b) === 2) {
			return (ord($b[0] & chr(0xFF)) << 8) | ord($b[1] & chr(0xFF));
		} else {
			$bi = ord($b[4] & chr(0x7F)) << 24;
			$bj = ord($b[5] & chr(0xFF)) << 16;
			$bk = ord($b[6] & chr(0xFF)) << 8;
			$bl = ord($b[7] & chr(0xFF));
			$bm = $bi | $bj | $bk | $bl;
			return $bm;
		}
	}
}
interface bn
{
	public function bo($a7);
	public function bp($ay);
	public function bq($a7, $br);
}
class bs implements bn
{
	private $bt = "GET /WebSocketConnection HTTP/1.1";
	private $bu = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $bv = "Host: ";
	private $bw = "Origin: ";
	private $bx = "Upgrade: websocket";
	private $by = "Sec-WebSocket-Key: 23eds34dfvce4";
	private $bz = "Sec-WebSocket-Version: 13";
	private $c0 = "Sec-WebSocket-Protocol: pushv1";
	private $c1 = "Connection: Upgrade";
	private $c2 = "\r\n";
	private $c3 = 10;
	private $c4 = -128;
	private $c5 = -128;
	private $c6 = 0x02;
	public function __construct()
	{
	}
	public function bo($a7)
	{
		$ay = new a();
		for ($bg = 0; $bg < $this->c3; $bg++) {
			$ay->j(chr(0x00));
		}
		for ($bg = 0; $bg < 4; $bg++) {
			$c7 = chr(rand(0, 100));
			$ay->j($c7);
			$ay->k($c7);
		}
		$ay->t();
		return $ay;
	}
	public function bp($ay)
	{
		$ba = chr($this->c4) | chr($this->c6);
		$ay->u();
		$c8 = $ay->y() - $ay->x();
		$c9 = $this->ca($c8);
		$cb = $this->cc($c8, $c9);
		$cd = 0;
		if ($c9 === 1) {
			$cd = 8;
			$ay->n($cd, $ba);
			$ay->n($cd + 1, $cb[0] | chr($this->c5));
		} else if ($c9 === 2) {
			$cd = 6;
			$ay->n($cd, $ba);
			$ay->n($cd + 1, chr(126) | chr($this->c5));
			for ($bg = 0; $bg <= 1; $bg++) {
				$ay->n($cd + 2 + $bg, $cb[$bg]);
			}
		} else {
			$ay->n($cd, $ba);
			$ay->n($cd + 1, chr(127) | chr($this->c5));
			for ($bg = 0; $bg <= 7; $bg++) {
				$ay->n($cd + 2 + $bg, $cb[$bg]);
			}
		}
		$ay->g($cd);
	}
	public function bq($a7, $br)
	{
		$ay = new a();
		if (!$br) {
			$ay->j($this->bt);
		} else {
			$ay->j($this->bu);
		}
		$ay->j($this->c2);
		$ay->j($this->bw);
		$ay->j("http://" . $a7);
		$ay->j($this->c2);
		$ay->j($this->bv);
		$ay->j($a7);
		$ay->j($this->c2);
		$ay->j($this->bx);
		$ay->j($this->c2);
		$ay->j($this->c1);
		$ay->j($this->c2);
		$ay->j($this->by);
		$ay->j($this->c2);
		$ay->j($this->bz);
		$ay->j($this->c2);
		$ay->j($this->c0);
		$ay->j($this->c2);
		$ay->j($this->c2);
		return $ay;
	}
	private function ca($ce)
	{
		if ($ce <= 125) {
			return 1;
		} else if ($ce <= 65535) {
			return 2;
		}
		return 8;
	}
	private function cc($p, $c9)
	{
		$ay = "";
		$cf = 8 * $c9 - 8;
		for ($bg = 0; $bg < $c9; $bg++) {
			$cg = $this->ch($p, $cf - 8 * $bg);
			$ci = $cg - (256 * intval($cg / 256));
			$ay .= chr($ci);
		}
		return $ay;
	}
	private function ch($cj, $ck)
	{
		return ($cj % 0x100000000) >> $ck;
	}
}
class cl implements bn
{
	private $cm = "POST / HTTP/1.1";
	private $bv = "Host: ";
	private $cn = "Content-Length: ";
	private $co = "00000";
	private $c2 = "\r\n";
	public function __construct()
	{
	}
	public function bo($a7)
	{
		$ay = new a();
		$ay->j($this->cm);
		$ay->j($this->c2);
		$ay->j($this->bv);
		$ay->j(b1::cp($a7));
		$ay->j($this->c2);
		$ay->j($this->cn);
		$ay->r();
		$ay->j($this->co);
		$ay->j($this->c2);
		$ay->j($this->c2);
		$ay->s();
		return $ay;
	}
	public function bp($ay)
	{
		$o = $ay->a2();
		$cq = strval($o - $ay->w());
		if (strlen($cq) <= strlen($this->co)) {
			$cr = 0;
			for ($bg = strlen($this->co) - strlen($cq); $bg < strlen($this->co); $bg++) {
				$ay->n($ay->v() + $bg, $cq[$cr]);
				$cr++;
			}
		} else {
			$cs = substr($ay->a0(), 0, $ay->v());
			$cs .= $cq;
			$cs .= substr($ay->a0(), $ay->v() + strlen($this->co));
			$ay->z($cs);
		}
	}
	public function bq($a7, $br)
	{
		return "";
	}
}
class ct
{
	private $cu = cv::cw;
	private $cx = MigratoryDataClient::TRANSPORT_WEBSOCKET;
	public function __construct()
	{
	}
	public function cy()
	{
		$this->cx = MigratoryDataClient::TRANSPORT_HTTP;
		$this->cu = cv::cz;
	}
	public function d0($ay, $d1, $d2, $d3)
	{
		if ($this->cx == MigratoryDataClient::TRANSPORT_HTTP) {
			$ay->j(chr(b1::d4(d5::d6)));
		} else {
			$ay->j(chr(b1::d4(d5::d6)) ^ $ay->l());
		}
		$ay->j($this->d7(b1::d8(d9::da), b1::cp($d1), $ay));
		$ay->j($this->d7(b1::d8(d9::cu), b1::db($this->cu), $ay));
		$ay->j($this->d7(b1::d8(d9::dc), b1::db($d2), $ay));
		$ay->j($this->d7(b1::d8(d9::dd), b1::db($d3), $ay));
		if ($this->cx == MigratoryDataClient::TRANSPORT_HTTP) {
			$ay->j(chr(b1::b2));
		} else {
			$ay->j(chr(b1::b2) ^ $ay->l());
		}
	}
	public function de($ay, $df, $dg)
	{
		if ($this->cx == MigratoryDataClient::TRANSPORT_HTTP) {
			$ay->j(chr(b1::d4(d5::dh)));
		} else {
			$ay->j(chr(b1::d4(d5::dh)) ^ $ay->l());
		}
		$ay->j($this->d7(b1::d8(d9::di), b1::cp($df->getSubject()), $ay));
        if ($df->isCompressed()) {
            $dj = $this->dk($df->getContent());
            if (strlen($dj) < strlen($df->getContent())) {
                $ay->j($this->d7(b1::d8(d9::dl), b1::cp($dj), $ay));
            } else {
                $ay->j($this->d7(b1::d8(d9::dl), b1::cp($df->getContent()), $ay));
                $df->setCompressed(false);
            }
        } else {
            $ay->j($this->d7(b1::d8(d9::dl), b1::cp($df->getContent()), $ay));
        }
		$dm = "c";
		if ($dm != null && strlen($dm) > 0) {
			$ay->j($this->d7(b1::d8(d9::dn), b1::cp($dm), $ay));
		}
		$ay->j($this->d7(b1::d8(d9::dp), b1::db($dg), $ay));
		if ($df->getQos() == QoS::GUARANTEED) {
			$ay->j($this->d7(b1::d8(d9::dq), b1::db(QoS::GUARANTEED), $ay));
		} else {
			$ay->j($this->d7(b1::d8(d9::dq), b1::db(QoS::STANDARD), $ay));
		}
		if ($df->isRetained() == true) {
			$ay->j($this->d7(b1::d8(d9::dr), b1::db(1), $ay));
		} else {
			$ay->j($this->d7(b1::d8(d9::dr), b1::db(0), $ay));
		}
        if ($df->isCompressed()) {
            $ay->j($this->d7(b1::d8(d9::ds), b1::db(1), $ay));
        }
		$ay->j($this->d7(b1::d8(d9::cu), b1::db($this->cu), $ay));
		if ($this->cx == MigratoryDataClient::TRANSPORT_HTTP) {
			$ay->j(chr(b1::b2));
		} else {
			$ay->j(chr(b1::b2) ^ $ay->l());
		}
	}
	private function d7($dt, $b, $ay)
	{
		$du = '';
		if ($this->cx == MigratoryDataClient::TRANSPORT_HTTP) {
			$du .= chr($dt);
			$du .= $b;
			$du .= chr(b1::dv);
		} else {
			$du .= chr($dt) ^ $ay->l();
			for ($bg = 0; $bg < strlen($b); $bg++) {
				$du .= $b[$bg] ^ $ay->l();
			}
			$du .= chr(b1::dv) ^ $ay->l();
		}
		return $du;
	}
    public function dk($dw)
    {
        $dx = gzdeflate($dw);
        if ($dx === false) {
            return $dw;
        }
        $dy = base64_encode($dx);
        return $dy;
    }
}
class dz
{
	const e0 = 32768;
	private $e1;
	private $cx;
	private $e2;
	public function __construct($e1, $cx, $e3)
	{
		$this->e1 = $e1;
		$this->cx = $cx;
		$this->e2 = $e3 / 1000;
	}
	public function e4()
	{
		$ay = new a();
		$o = -1;
		$e5 = microtime(true);
		while ($o == -1) {
			$b = @fread($this->e1, dz::e0);
			if ($b === false) {
				return "";
			}
			if (strlen($b) == 0) {
				return "";
			}
			$ay->j($b);
			if ($this->cx === MigratoryDataClient::TRANSPORT_HTTP) {
				$o = e6::e7($ay->a0());
			} else {
				$o = aw::ax($ay);
				if ($o === -1 && strpos($ay->a0(), "Sec-WebSocket-Accept") !== false) {
					return $ay;
				}
			}
			if ($o != -1 && b1::b9($ay->q($o)) == b1::d4(d5::e8)) {
				$e9 = 2;
				if ($this->cx === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
					$e9++;
				}
				$ea = $ay->a2();
				$ay->z(substr($ay->a0(), $o + $e9));
				if ($ea === $o + $e9) {
					$o = -1;
				}
			}
			$eb = (microtime(true) - $e5);
			if ($eb >= $this->e2 && $ay->a2() === 0) {
				return "";
			}
		}
		$ay->g($o);
		return $ay;
	}
}
class ec
{
	private $e1;
	public function __construct($e1)
	{
		$this->e1 = $e1;
	}
	public function ed($b)
	{
		$ee = $b;
		$ef = strlen($b);
		while (true) {
			$eg = @fwrite($this->e1, $ee);
			if ($eg === false) {
				return false;
			}
			if ($eg < $ef) {
				$ee = substr($ee, $eg);
				$ef -= $eg;
			} else {
				break;
			}
		}
		return true;
	}
}
class b1
{
	public static $eh = array();
	public static $ei = array();
	public static $ej = array();
	public static $ek = array();
	const el = 0x19;
	const b2 = 0x7F;
	const dv = 0x1E;
	const em = 0x1F;
	public static function en()
	{
		self::$eh = array_fill(0, 128, -1);
		self::$eh[d5::eo] = 0x01;
		self::$eh[d5::ep] = 0x02;
		self::$eh[d5::eq] = 0x03;
		self::$eh[d5::e8] = 0x04;
		self::$eh[d5::er] = 0x05;
		self::$eh[d5::es] = 0x06;
		self::$eh[d5::et] = 0x07;
		self::$eh[d5::eu] = 0x08;
		self::$eh[d5::ev] = 0x09;
		self::$eh[d5::ew] = 0x0B;
		self::$eh[d5::ex] = 0x0C;
		self::$eh[d5::ey] = 0x0E;
		self::$eh[d5::ez] = 0x0F;
		self::$eh[d5::dh] = 0x10;
		self::$eh[d5::f0] = 0x11;
		self::$eh[d5::f1] = 0x12;
		self::$eh[d5::f2] = 0x13;
		self::$eh[d5::f3] = 0x14;
		self::$eh[d5::d6] = 0x1A;
		self::$ei = array_fill(0, 128, -1);
		self::$ei[d9::di] = 0x01;
		self::$ei[d9::dl] = 0x02;
		self::$ei[d9::f4] = 0x03;
		self::$ei[d9::f5] = 0x04;
		self::$ei[d9::cu] = 0x05;
		self::$ei[d9::dp] = 0x06;
		self::$ei[d9::f6] = 0x07;
		self::$ei[d9::f7] = 0x08;
		self::$ei[d9::f8] = 0x09;
		self::$ei[d9::f9] = 0x0C;
		self::$ei[d9::fa] = 0x0E;
		self::$ei[d9::fb] = 0x0F;
		self::$ei[d9::dn] = 0x10;
		self::$ei[d9::fc] = 0x11;
		self::$ei[d9::fd] = 0x12;
		self::$ei[d9::da] = 0x13;
		self::$ei[d9::fe] = 0x14;
		self::$ei[d9::ff] = 0x15;
		self::$ei[d9::fg] = 0x16;
		self::$ei[d9::dr] = 0x17;
		self::$ei[d9::dq] = 0x18;
		self::$ei[d9::fh] = 0x1A;
		self::$ei[d9::fi] = 0x1B;
		self::$ei[d9::fj] = 0x1C;
		self::$ei[d9::fk] = 0x1D;
		self::$ei[d9::fl] = 0x20;
		self::$ei[d9::fm] = 0x27;
		self::$ei[d9::fn] = 0x23;
		self::$ei[d9::dc] = 0x24;
		self::$ei[d9::fo] = 0x25;
		self::$ei[d9::dd] = 0x2D;
		self::$ei[d9::fp] = 0x1D;
		self::$ei[d9::ds] = 0x26;
		self::$ek = array_fill(0, 255, -1);
		self::$ek[self::b2] = 0x01;
		self::$ek[self::dv] = 0x02;
		self::$ek[self::em] = 0x03;
		self::$ek[fq::fr] = 0x04;
		self::$ek[fq::fs] = 0x05;
		self::$ek[fq::ft] = 0x06;
		self::$ek[fq::fu] = 0x07;
		self::$ek[fq::fv] = 0x08;
		self::$ek[33] = 0x09;
		self::$ek[self::el] = 0x0B;
		self::$ej = array_fill(0, 255, -1);
		for ($i = 0; $i <= 128; $i++) {
			$e = self::fw($i);
			if ($e != -1) {
				self::$ej[$e] = $i;
			}
		}
	}
	public static function cp($b)
	{
		$fx = array_merge(unpack('C*', $b));
		$fy = 0;
		for ($bg = 0; $bg < count($fx); $bg++) {
			$fz = self::fw($fx[$bg]);
			if ($fz != -1) {
				$fy++;
			}
		}
		if ($fy == 0) {
			return call_user_func_array("pack", array_merge(array("C*"), $fx));
		}
		$du = array_fill(0, count($fx) + $fy, 0);
		for ($bg = 0, $g0 = 0; $bg < count($fx); $bg++, $g0++) {
			$fz = self::fw($fx[$bg]);
			if ($fz != -1) {
				$du[$g0] = self::em;
				$du[$g0 + 1] = $fz;
				$g0++;
			} else {
				$du[$g0] = $fx[$bg];
			}
		}
		return call_user_func_array("pack", array_merge(array("C*"), $du));
	}
	public static function g1($b)
	{
		$fx = array_merge(unpack('C*', $b));
		$fy = 0;
		if (count($fx) == 0) {
			return $b;
		}
		for ($bg = 0; $bg < count($fx); $bg++) {
			if ($fx[$bg] == self::em) {
				$fy++;
			}
		}
		$du = array_fill(0, count($fx) - $fy, 0);
		for ($bg = 0, $g0 = 0; $bg < count($fx); $bg++, $g0++) {
			$b8 = $fx[$bg];
			if ($b8 == self::em) {
				if ($bg + 1 < count($fx)) {
					$du[$g0] = self::g2($fx[$bg + 1]);
					if ($du[$g0] == -1) {
						throw new \InvalidArgumentException();
					}
					$bg++;
				} else {
					throw new \InvalidArgumentException();
				}
			} else {
				$du[$g0] = $b8;
			}
		}
		return call_user_func_array("pack", array_merge(array("C*"), $du));
	}
	public static function g3($b, $g4, $g5)
	{
		$dt = null;
		$g6 = strpos($b, chr(self::d8($g4)));
		$g7 = strpos($b, chr(self::dv), $g6);
		if ($g6 !== false && $g7 !== false) {
			$g8 = substr($b, $g6 + 1, $g7 - ($g6 + 1));
			switch ($g5) {
				case g9::ga:
					$dt = $g8;
					break;
				case g9::gb:
					$dt = $g8;
					break;
				case g9::gc:
					$dt = $g8;
					break;
				case g9::gd:
					$dt = self::b9($g8);
					break;
			}
		}
		return $dt;
	}
	public static function b9($ge)
	{
		$b = array_merge(unpack("C*", $ge));
		$du = 0;
		$gf = -1;
		$cj = 0;
		$gg;
		$b8;
		$gh = count($b);
		$o = 0;
		if ($gh == 1) {
			return $b[0];
		} else if ($gh == 2 && $b[$o] == self::em) {
			$b8 = self::g2($b[$o + 1]);
			if ($b8 != -1) {
				return $b8;
			} else {
				throw new \InvalidArgumentException();
			}
		}
		for (; $gh > 0; $gh--) {
			$b8 = $b[$o];
			$o++;
			if ($b8 == self::em) {
				if ($gh - 1 < 0) {
					throw new \InvalidArgumentException();
				}
				$gh--;
				$b8 = $b[$o];
				$o++;
				$gg = self::g2($b8);
				if ($gg == -1) {
					throw new \InvalidArgumentException();
				}
			} else {
				$gg = $b8;
			}
			if ($gf > 0) {
				$cj |= $gg >> $gf;
				$du = $du << 8 | ($cj >= 0 ? $cj : $cj + 256);
				$cj = ($gg << (8 - $gf));
			} else {
				$cj = ($gg << -$gf);
			}
			$gf = ($gf + 7) % 8;
		}
		return $du;
	}
	public static function db($cj)
	{
		if (($cj & 0xFFFFFF80) == 0) {
			$i = self::fw($cj);
			if ($i == -1) {
				return pack('C*', $cj);
			} else {
				return pack('C*', self::em, $i);
			}
		}
		$gi = 0;
		if (($cj & 0xFF000000) != 0) {
			$gi = 24;
		} else if (($cj & 0x00FF0000) != 0) {
			$gi = 16;
		} else {
			$gi = 8;
		}
		$du = array_fill(0, 10, 0);
		$gj = 0;
		$gk = 0;
		while ($gi >= 0) {
			$b = (($cj >> $gi) & 0xFF);
			$gk++;
			$du[$gj] |= ($b >= 0 ? $b : $b + 256) >> $gk;
			$fz = self::fw($du[$gj]);
			if ($fz != -1) {
				$du[$gj] = self::em;
				$du[$gj + 1] = $fz;
				$gj++;
			}
			$gj++;
			$du[$gj] |= ($b << (7 - $gk)) & 0x7F;
			$gi -= 8;
		}
		$fz = self::fw($du[$gj]);
		if ($fz != -1) {
			$du[$gj] = self::em;
			$du[$gj + 1] = $fz;
			$gj++;
		}
		$gj++;
		if ($gj < count($du)) {
			$du = array_slice($du, 0, $gj);
		}
		return call_user_func_array("pack", array_merge(array("C*"), $du));
	}
	public static function g2($b)
	{
		return $b >= 0 ? self::$ej[$b] : -1;
	}
	public static function fw($b)
	{
		return $b >= 0 ? self::$ek[$b] : -1;
	}
	public static function d8($h)
	{
		return self::$ei[$h];
	}
	public static function d4($o)
	{
		return self::$eh[$o];
	}
}
class d5
{
	const eo = 0;
	const ep = 1;
	const eq = 2;
	const e8 = 3;
	const er = 4;
	const es = 5;
	const et = 6;
	const eu = 7;
	const f1 = 8;
	const ev = 9;
	const ew = 10;
	const ex = 11;
	const ey = 12;
	const ez = 13;
	const f0 = 14;
	const dh = 15;
	const f2 = 16;
	const f3 = 17;
	const d6 = 18;
}
class d9
{
	const di = 0;
	const dl = 1;
	const f4 = 2;
	const f5 = 3;
	const cu = 4;
	const dp = 5;
	const f6 = 6;
	const f7 = 7;
	const f8 = 8;
	const f9 = 9;
	const fa = 10;
	const fb = 11;
	const fd = 12;
	const da = 13;
	const fe = 14;
	const ff = 15;
	const fg = 16;
	const dr = 17;
	const dq = 18;
	const fh = 19;
	const fi = 20;
	const fj = 21;
	const fk = 22;
	const fl = 23;
	const fm = 24;
	const fn = 25;
	const dc = 26;
	const fo = 27;
	const dn = 28;
	const fc = 29;
	const dd = 30;
	const fp = 31;
	const ds = 32;
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
class cv
{
	const cz = 4;
	const cw = 8;
}
b1::en();
class e6
{
	const gl = '/^\/([^\/]+\/)*([^\/]+|\*)$/';
	const gm = "\r\n\r\n";
	const cn = "Content-Length: ";
	public static function gn($g8)
	{
		return preg_match(self::gl, $g8);
	}
	public static function go($ay)
	{
		$gp = array();
		$o = $ay->m();
		$gq = ord($ay->q($o));
		$o++;
		while (true) {
			$dt = ord($ay->q($o));
			$o++;
			$bg = strpos($ay->a0(), chr(b1::dv), $o);
			if ($bg === false) {
				break;
			}
			$fx = substr($ay->a0(), $o, ($bg - $o));
			if ($dt == b1::d8(d9::dp)) {
				$gp['session'] = b1::b9($fx);
			} else if ($dt == b1::d8(d9::fe)) {
				$gp['reason'] = $fx;
			} else if ($dt == b1::d8(d9::fp)) {
                $gp['message_size'] = b1::b9($fx);
            }
			$o = $bg + 1;
			if ($o >= $ay->a2()) {
				break;
			}
		}
		return $gp;
	}
	public static function e7($b)
	{
		$gr = b1::cp(e6::cn);
		$o = e6::gs($gr, $b);
		if ($o == -1) {
			return -1;
		}
		$o += strlen($gr);
		$gt = "\r";
		$gu = e6::gv($b, $o, strlen($b), $gt);
		if ($gu == -1) {
			return -1;
		}
		$gw = substr($b, $o, $gu - $o);
		$gx = intval($gw);
		$o = e6::gs(e6::gm, $b);
		if ($o == -1) {
			return $o;
		}
		$o += strlen(e6::gm);
		if (($o + $gx) > strlen($b)) {
			return -1;
		}
		return $o;
	}
	private static function gv($b, $ar, $at, $gy)
	{
		for ($bg = $ar; $bg < $at; $bg++) {
			if ($b[$bg] == $gy) {
				return $bg;
			}
		}
		return -1;
	}
	private static function gs($gz, $h0)
	{
		$h1 = strlen($gz);
		$ck = strlen($h0);
		$h2 = array_fill(0, $h1, 0);
		e6::h3($gz, $h1, $h2);
		$bg = 0;
		$g0 = 0;
		while ($bg < $ck) {
			if ($gz[$g0] == $h0[$bg]) {
				$g0++;
				$bg++;
			}
			if ($g0 == $h1) {
				return $bg - $g0;
			} else if ($bg < $ck && $gz[$g0] != $h0[$bg]) {
				if ($g0 != 0)
					$g0 = $h2[$g0 - 1];
				else
					$bg = $bg + 1;
			}
		}
		return -1;
	}
	private static function h3($gz, $h1, &$h2)
	{
		$gh = 0;
		$h2[0] = 0;
		$bg = 1;
		while ($bg < $h1) {
			if ($gz[$bg] == $gz[$gh]) {
				$gh++;
				$h2[$bg] = $gh;
				$bg++;
			} else {
				if ($gh != 0) {
					$gh = $h2[$gh - 1];
				} else {
					$h2[$bg] = 0;
					$bg++;
				}
			}
		}
	}
}
class Version
{
        //      6       h4   xx   h4 xxx
    // push version h4 API ID h4 API version
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
class h5
{
	private $h6 = 3;
	private $dd = Version::VERSION;
	private $e3 = 1000;
	private $ab = false;
	private $a7 = null;
	private $h7 = null;
	private $d1 = null;
	private $h8 = null;
	private $h9 = null;
	private $cx = null;
	private $e1 = null;
	private $ha = null;
	private $hb = null;
	private $dg = -1;
	private $hc = false;
	private $hd = null;
	public function __construct()
	{
		$this->cx = MigratoryDataClient::TRANSPORT_WEBSOCKET;
		$this->h8 = new bs();
		$this->h9 = new ct();
	}
	public function he($hf = null)
	{
		if (is_null($hf)) {
			$hg = array();
			$hh = true;
			foreach ($this->h7->an() as $hi) {
				try {
					$this->he($hi);
					$hh = false;
					break;
				} catch (MigratoryDataException $hj) {
					$hg[] = $hj;
				}
			}
			if ($hh == true) {
				throw new MigratoryDataException(MigratoryDataException::E_CLUSTER_MEMBERS_CONNECTION_FAILED, "", $hg);
			}
		} else {
			$this->a7 = $hf->ag();
			$this->hk($this->a7, $hf->ah());
			$this->ha = new dz($this->e1, $this->cx, $this->e3);
			$this->hb = new ec($this->e1);
			$this->hl();
			$this->hm($hf->ai());
			$this->hc = true;
		}
	}
	private function hk($a7, $a8)
	{
		if ($this->ab) {
			$hn = @stream_context_create();
			$ho = @stream_context_set_option($hn, 'ssl', 'allow_self_signed', true);
			if (!$ho) {
				throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "ssl socket creation");
			}
			$this->e1 = @stream_socket_client("tlsv1.2://" . $a7 . ":" . $a8, $hp, $hq,
				$this->e3 / 1000, STREAM_CLIENT_CONNECT, $hn);
		} else {
			$this->e1 = @stream_socket_client("tcp://" . $a7 . ":" . $a8, $hp, $hq,
				$this->e3 / 1000);
		}
		if (!$this->e1) {
			throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, $hq);
		}
		$hr = @stream_set_timeout($this->e1, floor($this->e3 / 1000), (($this->e3 % 1000) * 1000));
		if ($hr === false) {
			throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "Socket set timeout error");
		}
	}
	private function hl()
	{
		if ($this->cx !== MigratoryDataClient::TRANSPORT_HTTP) {
			$ay = $this->h8->bq($this->a7, $this->ab);
			$hs = $this->hb->ed($ay->a0());
			if ($hs === true) {
				$hs = $this->ha->e4();
			}
			if ($hs == false) {
				$this->ht();
				throw new MigratoryDataException(MigratoryDataException::E_TRANSPORT_INIT_FAILED, "Websocket handshake");
			}
		}
	}
	private function hm($aa)
	{
		$ay = $this->h8->bo($this->a7);
		$this->h9->d0($ay, $this->d1, $this->h6, $this->dd);
		$this->h8->bp($ay);
		$hs = $this->hb->ed($ay->a1());
		if ($hs === true) {
			$hs = $this->ha->e4();
		}
		if ($hs == false) {
			$this->ht();
			throw new MigratoryDataException(MigratoryDataException::E_CONNECTION_FAILED, $aa . ', socket_error');
		} else {
			$headers = e6::go($hs);
			if (array_key_exists('session', $headers)) {
				$this->dg = $headers['session'];
                if (array_key_exists('message_size', $headers)) {
                    $this->hd = $headers['message_size'];
                }
			} else {
				$this->ht();
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, $aa . ", Got connect response: " . $hs);
			}
		}
	}
	public function hu()
	{
		$this->hc = false;
		$this->ht();
	}
	private function ht()
	{
		$this->dg = -1;
		if ($this->e1 != null) {
			@fclose($this->e1);
		}
		$this->e1 = null;
		$this->ha = null;
		$this->hb = null;
	}
	public function hv($df)
	{
		$hw = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
		if ($this->dg == -1) {
			$this->ht();
			try {
				$this->he();
			} catch (MigratoryDataException $hj) {
				return $hw;
			}
		}
		$ay = $this->h8->bo($this->a7);
		$this->h9->de($ay, $df, $this->dg);
		$this->h8->bp($ay);
        if (isset($this->hd) && ($ay->a2() - $ay->m()) > $this->hd) {
            return MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED;
        }
		$hs = $this->hb->ed($ay->a1());
		if ($hs === true) {
			$hs = $this->ha->e4();
		}
		if ($hs == false) {
			$this->ht();
			return $hw;
		} else {
			$headers = e6::go($hs);
			if (array_key_exists('reason', $headers)) {
				$reason = $headers['reason'];
				if ("OK" == $reason) {
					$hw = MigratoryDataClient::NOTIFY_PUBLISH_OK;
				} else if ("DENY" == $reason) {
					$hw = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
				} else {
					$hw = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
				}
			} else {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_PROTOCOL, "Got publish response: " . $hs . strlen($hs));
			}
		}
		return $hw;
	}
	public function hx($al)
	{
		$this->h7 = new aj($al, $this->ab);
	}
	public function hy($d1)
	{
		$this->d1 = $d1;
	}
	public function hz($e3)
	{
		$this->e3 = $e3;
	}
	public function i0($ab)
	{
		$this->ab = $ab;
		if (!is_null($this->h7)) {
			$this->h7->ao($ab);
		}
	}
	public function i1($cx)
	{
		if ($cx === MigratoryDataClient::TRANSPORT_HTTP) {
			$this->cx = $cx;
			$this->h8 = new cl();
			$this->h9->cy();
		}
	}
	public function i2()
	{
		return $this->h7;
	}
	public function i3()
	{
		return $this->d1;
	}
	public function i4()
	{
		return $this->hc;
	}
}
class i5
{
	private $i6 = null;
	public function __construct()
	{
		$this->i6 = new h5();
	}
	public function i7($i8)
	{
		if ($this->i6->i4() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEntitlementToken() method");
		}
		if (trim($i8) === '') {
			throw  new MigratoryDataException(MigratoryDataException::E_ENTITLEMENT_TOKEN);
		}
		$this->i6->hy($i8);
	}
	public function i9($al)
	{
		if ($this->i6->i4() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setServers() method");
		}
		if (!is_array($al) || count($al) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL_LIST);
		}
		foreach ($al as $addr) {
			if (!isset($addr) || trim($addr) === '') {
				throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $addr);
			}
		}
		$this->i6->hx($al);
	}
	public function he()
	{
		if ($this->i6->i4() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
		}
		$d1 = $this->i6->i3();
		if (!isset($d1)) {
			throw  new MigratoryDataException(MigratoryDataException::E_ENTITLEMENT_TOKEN);
		}
		$h7 = $this->i6->i2();
		if (!isset($h7)) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL_LIST, "Before connect() you need to use setServers().");
		}
		try {
			$this->i6->he();
		} catch (MigratoryDataException $e) {
			throw new MigratoryDataException(MigratoryDataException::E_CLUSTER_MEMBERS_CONNECTION_FAILED, "", $e->getExceptions());
		}
	}
	public function ht()
	{
		if ($this->i6->i4() === true) {
			$this->i6->hu();
		}
	}
	public function hv($df)
	{
		if ($this->i6->i4() === false) {
			throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
		}
		if (is_null($df)) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_NULL);
		}
		if (!($df instanceof MigratoryDataMessage)) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_INVALID);
		}
		$ia = $df->getSubject();
		$dw = $df->getContent();
		if (is_null($ia) || strlen($ia) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_SUBJECT, "subject is empty");
		}
		if (is_null($dw) || strlen($dw) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_MSG_NULL, "content of the message is null");
		}
		return $this->i6->hv($df);
	}
	public function ib($ic)
	{
		if ($this->i6->i4() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
		}
		$this->i6->i1($ic);
	}
	public function i0($br)
	{
		if ($this->i6->i4() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
		}
		$this->i6->i0($br);
	}
	public function id($e3)
	{
		if ($this->i6->i4() === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
		}
		$this->i6->hz($e3);
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
	protected $hg = array();
	protected $ie = "";
	protected $code = -1;
	protected $message = "";
	public function getCause()
	{
		return $this->ie;
	}
	public function getDetail()
	{
		return $this->message;
	}
	public function getExceptions()
	{
		return $this->hg;
	}
	public function __construct($code, $cause = "", $exceptions = array())
	{
		$this->code = $code;
		$this->ie = $cause;
		$this->hg = $exceptions;
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
	private $ia = "";
	private $dw = "";
	private $ig = null;
	private $ih = null;
    protected $ii;
    public function __construct($subject, $content, $qos = QoS::GUARANTEED, $retained = true)
	{
		if (e6::gn($subject)) {
			$this->ia = $subject;
			$this->dw = $content;
			$this->ig = $qos;
			$this->ih = $retained;
		} else {
			throw new MigratoryDataException(MigratoryDataException::E_INVALID_SUBJECT, $subject);
		}
	}
	public function getSubject()
	{
		return $this->ia;
	}
	public function getContent()
	{
		return $this->dw;
	}
	public function getQos()
	{
		return $this->ig;
	}
	public function isRetained()
	{
		return $this->ih;
	}
    public function setCompressed($compressionBool)
    {
        $this->ii = $compressionBool;
    }
    public function isCompressed()
    {
        return $this->ii;
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
	private $ij = null;
	public function __construct()
	{
		$this->ij = new i5();
	}
	public function setEntitlementToken($i8)
	{
		$this->ij->i7($i8);
	}
	public function setServers($al)
	{
		$this->ij->i9($al);
	}
	public function connect()
	{
		$this->ij->he();
	}
	public function disconnect()
	{
		$this->ij->ht();
	}
	public function publish($df)
	{
		return $this->ij->hv($df);
	}
	public function setTransport($ic)
	{
		$this->ij->ib($ic);
	}
	public function setEncryption($br)
	{
		$this->ij->i0($br);
	}
	public function setConnectionTimeout($e3)
	{
		$this->ij->id($e3);
	}
}

<?php
namespace ICANS\Component\IcansLoggingComponent\Flume;
/**
 * Autogenerated by Thrift Compiler (0.9.0-dev)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 * @generated
 */
use Thrift\Exception\TApplicationException;

use Thrift\Protocol\TProtocol;

use Thrift\Type\TMessageType;

/**
 * @codeCoverageIgnore
 * @codingStandardsIgnoreFile
 */
class ThriftFlumeEventServerClient implements ThriftFlumeEventServerIf
{
    protected $input_ = null;
    protected $output_ = null;

    protected $seqid_ = 0;

    public function __construct($input, $output = null)
    {
        $this->input_ = $input;
        $this->output_ = $output ? $output : $input;
    }

    public function append(\ICANS\Component\IcansLoggingComponent\Flume\ThriftFlumeEvent $evt)
    {
        $this->send_append($evt);
    }

    public function send_append(\ICANS\Component\IcansLoggingComponent\Flume\ThriftFlumeEvent $evt)
    {
        $args = new \ICANS\Component\IcansLoggingComponent\Flume\ThriftFlumeEventServer_append_args();
        $args->evt = $evt;
        $bin_accel = ($this->output_ instanceof TProtocol::$TBINARYPROTOCOLACCELERATED) && function_exists
        ('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'append', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('append', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function close()
    {
        $this->send_close();
        $this->recv_close();
    }

    public function send_close()
    {
        $args = new \ICANS\Component\IcansLoggingComponent\Flume\ThriftFlumeEventServer_close_args();
        $bin_accel = ($this->output_ instanceof TProtocol::$TBINARYPROTOCOLACCELERATED) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'close', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('close', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_close()
    {
        $bin_accel = ($this->input_ instanceof TProtocol::$TBINARYPROTOCOLACCELERATED) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) $result = thrift_protocol_read_binary($this->input_,
            '\ICANS\Component\IcansLoggingComponent\Flume\ThriftFlumeEventServer_close_result', $this->input_->isStrictRead());
        else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;

            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new \ICANS\Component\IcansLoggingComponent\Flume\ThriftFlumeEventServer_close_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        return;
    }

}
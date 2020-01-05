<?php
namespace Yes\Result;
use Yes\ResultInterface;

interface AuthResultInterface extends ResultInterface{

    public const FAILURE_IDENTITY_NOT_FOUND     = "FAILURE_IDENTITY_NOT_FOUND";

    public const FAILURE_IDENTITY_AMBIGUOUS     = "FAILURE_IDENTITY_AMBIGUOUS";

    public const FAILURE_CREDENTIAL_INVALID     = "FAILURE_CREDENTIAL_INVALID";

    public const FAILURE_UNCATEGORIZED          = "FAILURE_UNCATEGORIZED";

    public const RETIRED = "RETIRED";

}
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerControl : MonoBehaviour {

    public float mouveSpeed;
    private float mouveSpeedStore;
    public float speedMultiplier;


    public float speedIncreaseMilston;
    private float speedIncreaseMilstonStore;
    private float SpeedMilstonCount;
    private float SpeedMilstonCountStore;



    public float jumpForce;
    public float jumpTime;
    private bool stopedJumping;
    private bool canDoublJump;
    private float jumpTimeCounter;

    private Rigidbody2D myRigidbody;

    public bool grounded;
    public LayerMask whatIsGround;
    public Transform groundCheck;
    public float groundCheckRadiuse;
    public GameManager theGameManager;

    public AudioSource jumpSound;
    public AudioSource deatSoud;

    //private Collider2D myCollider;

    private Animator myAnimator;
    // Use this for initialization
    void Start() {
        myRigidbody = GetComponent<Rigidbody2D>();

        //myCollider = GetComponent<Collider2D>();

        myAnimator = GetComponent<Animator>();

        jumpTimeCounter = jumpTime;

        SpeedMilstonCount = speedIncreaseMilston;

        mouveSpeedStore = mouveSpeed;
        SpeedMilstonCountStore = speedIncreaseMilston;
        speedIncreaseMilstonStore = speedIncreaseMilston;
        stopedJumping = true;
    }

    // Update is called once per frame
    void Update() {
        //grounded = Physics2D.IsTouchingLayers(myCollider, whatIsGround);
        grounded = Physics2D.OverlapCircle(groundCheck.position, groundCheckRadiuse, whatIsGround);

        if (transform.position.x > SpeedMilstonCount)
        {
            SpeedMilstonCount += speedIncreaseMilston;
            speedIncreaseMilston = speedIncreaseMilston * speedMultiplier;

            mouveSpeed = mouveSpeed * speedMultiplier;
        }


        myRigidbody.velocity = new Vector2(mouveSpeed, myRigidbody.velocity.y);
        if (Input.GetKeyDown(KeyCode.Space) || Input.GetMouseButtonDown(0))
        {
            if (grounded)
            {
                myRigidbody.velocity = new Vector2(myRigidbody.velocity.x, jumpForce);
                stopedJumping = false;
                jumpSound.Play();
            }
            if (!grounded && canDoublJump)
            {
                myRigidbody.velocity = new Vector2(myRigidbody.velocity.x, jumpForce);
                jumpTimeCounter = jumpTime;
                stopedJumping = false;
                canDoublJump = false;
                jumpSound.Play();
            }

        }
        if ((Input.GetKey(KeyCode.Space) || Input.GetMouseButton(0)) && !stopedJumping)
        {
            if (jumpTimeCounter > 0)
            {
                myRigidbody.velocity = new Vector2(myRigidbody.velocity.x, jumpForce);
                jumpTimeCounter -= Time.deltaTime;
            }
        }
        if (Input.GetKeyUp(KeyCode.Space) || Input.GetMouseButtonUp(0))
        {
            jumpTimeCounter = 0;
            stopedJumping = true;
        }

        if (grounded)
        {
            jumpTimeCounter = jumpTime;
            canDoublJump = true;

        }
        myAnimator.SetFloat("Speed", myRigidbody.velocity.x);
        myAnimator.SetBool("IsGrounded", grounded);
    }

    private void OnCollisionEnter2D(Collision2D other)
    {
        if (other.gameObject.tag == "killbox")
        {
            deatSoud.Play();
            theGameManager.ResartGame();
            mouveSpeed = mouveSpeedStore;
            SpeedMilstonCount = SpeedMilstonCountStore;
            speedIncreaseMilston = speedIncreaseMilstonStore;
        }
    }
}

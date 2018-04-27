using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class playerControl : MonoBehaviour {

    public float mouveSpeed;
    //public Rigidbody theRB;
    public float jumpforce;
    public CharacterController control;

    private Vector3 mouvdirec;
    public float gravityScal;
    public Animator anim;
    public Transform pivot;
    public float rotatateSpeed;
    public GameObject playerModel;
    // Use this for initialization
    public float knockBackForce;
    public float knockBackTime;
    private float knockBackCounter;

    void Start() {
        control = GetComponent<CharacterController>();
        //theRB = GetComponent<Rigidbody>();
    }

    // Update is called once per frame
    void Update() {
        //mouvdirec = new Vector3(Input.GetAxis("Horizontal") * mouveSpeed, mouvdirec.y, Input.GetAxis("Vertical") * mouveSpeed);
        if (knockBackCounter < 0)
        {
            float yStore = mouvdirec.y;
            mouvdirec = (transform.forward * Input.GetAxis("Vertical")) + (transform.right * Input.GetAxis("Horizontal"));
            mouvdirec = mouvdirec.normalized * mouveSpeed;
            mouvdirec.y = yStore;
            if (control.isGrounded)
            {
                mouvdirec.y = 0f;
                if (Input.GetButtonDown("Jump"))
                {
                    mouvdirec.y = jumpforce;
                }
            }
        }
        else
        {
            knockBackCounter -= Time.deltaTime;
        }

        mouvdirec.y = mouvdirec.y + (Physics.gravity.y * gravityScal * Time.deltaTime);
        control.Move(mouvdirec * Time.deltaTime);

        //mouv the player in  directin of the pivote
        if (Input.GetAxis("Horizontal") != 0 || Input.GetAxis("Vertical") != 0)
        {
            transform.rotation = Quaternion.Euler(0f, pivot.rotation.eulerAngles.y, 0f);
            Quaternion newRotation = Quaternion.LookRotation(new Vector3(mouvdirec.x,0f,mouvdirec.z));
            playerModel.transform.rotation = Quaternion.Slerp(playerModel.transform.rotation, newRotation, rotatateSpeed * Time.deltaTime);
        }

            anim.SetBool("isGrounded",control.isGrounded);
        anim.SetFloat("Speed", (Mathf.Abs(Input.GetAxis("Vertical"))+ Mathf.Abs(Input.GetAxis("Horizontal"))));

        //theRB.velocity = new Vector3(Input.GetAxis("Horizontal") * mouveSpeed, theRB.velocity.y, Input.GetAxis("Vertical") * mouveSpeed);
       /* if (Input.GetButtonDown("Jump"))
        {
            theRB.velocity = new Vector3(theRB.velocity.x, jumpforce, theRB.velocity.z);
        }*/
	}
    public void Knockback(Vector3 direction)
    {
        knockBackCounter = knockBackTime;

        //direction = new Vector3(1f, 1f, 1f);//teste code
        mouvdirec = direction * knockBackForce;
        mouvdirec.y = knockBackForce; 

    }
}
